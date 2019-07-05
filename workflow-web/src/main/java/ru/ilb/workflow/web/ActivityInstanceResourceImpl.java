/*
 * Copyright 2019 slavb.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
package ru.ilb.workflow.web;

import java.util.Map;
import java.util.function.Supplier;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.inject.Inject;
import javax.ws.rs.container.ResourceContext;
import javax.ws.rs.core.Context;
import org.apache.cxf.jaxrs.ext.MessageContext;
import org.apache.cxf.jaxrs.json.basic.JsonMapObject;
import org.enhydra.shark.api.client.wfmc.wapi.WAPI;
import org.enhydra.shark.api.client.wfmc.wapi.WMActivityInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.common.SharkConstants;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import org.springframework.context.ApplicationContext;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.jsonschema.utils.JsonMapMarshaller;
import ru.ilb.workflow.api.ActivityInstanceResource;
import ru.ilb.workflow.api.ProcessContextResource;
import ru.ilb.workflow.api.ActivityFormResource;
import ru.ilb.workflow.api.JsonSchemaResource;
import ru.ilb.workflow.mappers.ActivityInstanceMapper;
import ru.ilb.workflow.session.AuthorizationHandler;
import ru.ilb.workflow.utils.SharkUtils;
import ru.ilb.workflow.utils.WAPIUtils;
import ru.ilb.workflow.utils.WorkflowUtils;
import ru.ilb.workflow.view.ActivityInstance;

public class ActivityInstanceResourceImpl implements ActivityInstanceResource {

    private final Supplier<WMSessionHandle> sessionHandleSupplier;

    private final String processInstanceId;

    private final String activityInstanceId;

    @Context
    private ResourceContext resourceContext;

    @Context
    protected MessageContext messageContext;

    @Inject
    private ApplicationContext applicationContext;

    @Inject
    private ActivityInstanceMapper activityInstanceMapper;

    public ActivityInstanceResourceImpl(Supplier<WMSessionHandle> sessionHandleSupplier, String processInstanceId, String activityInstanceId) {
        this.sessionHandleSupplier = sessionHandleSupplier;
        this.processInstanceId = processInstanceId;
        this.activityInstanceId = activityInstanceId;
    }

    @Override
    @Transactional
    public ActivityInstance getActivityInstance() {
        try {
            WMSessionHandle shandle = sessionHandleSupplier.get();
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            WMActivityInstance wmActivityInstance = wapi.getActivityInstance(shandle, processInstanceId, activityInstanceId);
            ActivityInstance activityInstance = activityInstanceMapper.createFromEntity(wmActivityInstance);

            return activityInstance;
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }

    }

    @Override
    public JsonSchemaResource getJsonSchemaResource() {
        JsonSchemaResourceImpl resource = new JsonSchemaResourceImpl(sessionHandleSupplier, processInstanceId, activityInstanceId);
        applicationContext.getAutowireCapableBeanFactory().autowireBean(resource);
        return resourceContext.initResource(resource);

    }

    @Override
    public ActivityFormResource getActivityFormResource() {
        ActivityFormResourceImpl resource = new ActivityFormResourceImpl(sessionHandleSupplier, processInstanceId, activityInstanceId);
        applicationContext.getAutowireCapableBeanFactory().autowireBean(resource);
        return resourceContext.initResource(resource);
    }

    @Override
    public ProcessContextResource getProcessContextResource() {
        ProcessContextResourceImpl resource = new ProcessContextResourceImpl(sessionHandleSupplier, processInstanceId, activityInstanceId);
        applicationContext.getAutowireCapableBeanFactory().autowireBean(resource);
        return resourceContext.initResource(resource);
    }

    @Override
    @Transactional
    public boolean completeActivity(JsonMapObject jsonmapobject) {
        try {
            WMSessionHandle shandle = sessionHandleSupplier.get();
            return completeActivity(shandle, processInstanceId, activityInstanceId, jsonmapobject);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    @Transactional
    public ActivityInstance completeAndNextActivity(JsonMapObject jsonmapobject) {
        try {
            WMSessionHandle shandle = sessionHandleSupplier.get();
            completeActivity(shandle, processInstanceId, activityInstanceId, jsonmapobject);
            ActivityInstance nextActivityInstance = null;
            WMActivityInstance nextAct = WAPIUtils.findNextActivity(shandle, AuthorizationHandler.getAuthorisedUser(), processInstanceId);
            if (nextAct != null) {
                nextActivityInstance = activityInstanceMapper.createFromEntity(nextAct);
                String url = WorkflowUtils.getActivityFormUrl(shandle, null, nextAct.getProcessInstanceId(), nextAct.getId());
                nextActivityInstance.setActivityFormUrl(url);
            }
            return nextActivityInstance;
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @SuppressWarnings("unchecked")
    private static boolean completeActivity(WMSessionHandle shandle, String processInstanceId, String activityInstanceId, JsonMapObject jsonmapobject) throws Exception {
        WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
        // update variables if set
        if (jsonmapobject != null && !jsonmapobject.asMap().isEmpty()) {
            Map<String, String> contextSignature = SharkUtils.getContextSignature(shandle, processInstanceId, true);
            Map<String, Object> context = JsonMapMarshaller.unmrashallMap(jsonmapobject.asMap(), contextSignature);
            SharkUtils.updateActivityInfo(shandle, processInstanceId, activityInstanceId, context);
        }

        WMActivityInstance activityinstance = wapi.getActivityInstance(shandle, processInstanceId, activityInstanceId);
        Boolean stateChanged = WAPIUtils.changeActivityState(shandle, activityinstance, SharkConstants.STATE_CLOSED_COMPLETED);
        return stateChanged;

    }

    @Override
    @Transactional
    public ActivityInstance goBackActivity(JsonMapObject jsonmapobject) {
        try {
            WMSessionHandle shandle = sessionHandleSupplier.get();
            WMActivityInstance activityInstance = SharkInterfaceWrapper.getShark().getExecutionAdministrationExtension().goBack(shandle, processInstanceId, true, null);
            return activityInstanceMapper.createFromEntity(activityInstance);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }
}
