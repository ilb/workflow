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

import java.net.URLEncoder;
import java.util.Map;
import java.util.function.Supplier;
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
import ru.ilb.jfunction.map.accessors.MapAccessor;
import ru.ilb.jsonschema.utils.JsonMapMarshaller;
import ru.ilb.workflow.api.ActivityFormResource;
import ru.ilb.workflow.api.ActivityInstanceResource;
import ru.ilb.workflow.api.JsonSchemaResource;
import ru.ilb.workflow.api.ProcessContextResource;
import ru.ilb.workflow.context.ContextConstants;
import ru.ilb.workflow.core.SessionData;
import ru.ilb.workflow.entities.ProcessInstance;
import ru.ilb.workflow.entities.ProcessInstanceFactory;
import ru.ilb.workflow.mappers.ActivityInstanceMapper;
import ru.ilb.workflow.session.AuthorizationHandler;
import ru.ilb.workflow.toolagent.WebClient;
import ru.ilb.workflow.utils.SharkUtils;
import ru.ilb.workflow.utils.WAPIUtils;
import ru.ilb.workflow.view.ActivityInstance;

public class ActivityInstanceResourceImpl implements ActivityInstanceResource {

    private final Supplier <SessionData> sessionHandleSupplier;

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

    @Inject
    private ProcessInstanceFactory processContextFactory;

    public ActivityInstanceResourceImpl(Supplier <SessionData> sessionHandleSupplier, String processInstanceId, String activityInstanceId) {
        this.sessionHandleSupplier = sessionHandleSupplier;
        this.processInstanceId = processInstanceId;
        this.activityInstanceId = activityInstanceId;
    }

    @Override
    @Transactional
    public ActivityInstance getActivityInstance() {
        try {
            WMSessionHandle shandle = sessionHandleSupplier.get().getSessionHandle();
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
    public boolean complete(JsonMapObject jsonmapobject) {
        try {
            return changeActivityState(jsonmapobject, SharkConstants.STATE_CLOSED_COMPLETED);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    @Transactional
    public ActivityInstance completeAndNext(JsonMapObject jsonmapobject) {
        try {
            WMSessionHandle shandle = sessionHandleSupplier.get().getSessionHandle();
            changeActivityState(shandle, jsonmapobject, SharkConstants.STATE_CLOSED_COMPLETED);
            ActivityInstance nextActivityInstance = null;
            WMActivityInstance nextAct = WAPIUtils.findNextActivity(shandle, AuthorizationHandler.getAuthorisedUser(), processInstanceId);
            if (nextAct != null) {
                nextActivityInstance = activityInstanceMapper.createFromEntity(nextAct);
            } else {
                // TODO FIXME TEMP
                ProcessInstance processInstance = processContextFactory.getProcessInstance(processInstanceId);
                MapAccessor processContext = processInstance.getContextAccessor();

                String callbackUrl = processContext.getStringProperty(ContextConstants.CALLBACKURL_VARIABLE);
                String resultUrl = processContext.getStringProperty(ContextConstants.RESULTURL_VARIABLE);
                if (callbackUrl != null) {
                    StringBuilder sb = new StringBuilder();
                    sb.append(callbackUrl);
                    sb.append(callbackUrl.contains("?") ? "&" : "?");
                    sb.append("&resultUrl=");
                    sb.append(URLEncoder.encode(resultUrl, "UTF-8"));
                    callbackUrl = sb.toString();
                    WebClient.execute("GET", callbackUrl, null, null);
                }
            }
            return nextActivityInstance;
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    // update variables if set
    @SuppressWarnings("unchecked")
    private void updateVariables(WMSessionHandle shandle, JsonMapObject jsonmapobject) throws Exception {
        if (jsonmapobject != null && !jsonmapobject.asMap().isEmpty()) {
            Map<String, String> contextSignature = SharkUtils.getContextSignature(shandle, processInstanceId, true);
            Map<String, Object> context = JsonMapMarshaller.unmrashallMap(jsonmapobject.asMap(), contextSignature);
            SharkUtils.updateActivityInfo(shandle, processInstanceId, activityInstanceId, context);
        }
    }

    @SuppressWarnings("unchecked")
    private boolean changeActivityState(WMSessionHandle shandle, JsonMapObject jsonmapobject, String state) throws Exception {
        updateVariables(shandle, jsonmapobject);
        WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
        WMActivityInstance activityinstance = wapi.getActivityInstance(shandle, processInstanceId, activityInstanceId);
        Boolean stateChanged = WAPIUtils.changeActivityState(shandle, activityinstance, state);
        return stateChanged;
    }

    @SuppressWarnings("unchecked")
    private boolean changeActivityState(JsonMapObject jsonmapobject, String state) throws Exception {
        WMSessionHandle shandle = sessionHandleSupplier.get().getSessionHandle();
        return changeActivityState(shandle, jsonmapobject, state);
    }

    @Override
    @Transactional
    public boolean start(JsonMapObject jsonmapobject) {
        try {
            return changeActivityState(jsonmapobject, SharkConstants.STATE_OPEN_RUNNING);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    @Transactional
    public boolean stop(JsonMapObject jsonmapobject) {
        try {
            return changeActivityState(jsonmapobject, SharkConstants.STATE_OPEN_NOT_RUNNING_NOT_STARTED);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    @Transactional
    public boolean suspend(JsonMapObject jsonmapobject) {
        try {
            return changeActivityState(jsonmapobject, SharkConstants.STATE_OPEN_NOT_RUNNING_SUSPENDED);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    @Transactional
    public boolean resume(JsonMapObject jsonmapobject) {
        try {
            WMSessionHandle shandle = sessionHandleSupplier.get().getSessionHandle();
            updateVariables(shandle, jsonmapobject);
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            WMActivityInstance activityinstance = wapi.getActivityInstance(shandle, processInstanceId, activityInstanceId);
            if (SharkConstants.STATE_OPEN_NOT_RUNNING_SUSPENDED.equals(activityinstance.getState().stringValue())) {
                Boolean stateChanged = WAPIUtils.changeActivityState(shandle, activityinstance, SharkConstants.STATE_OPEN_RUNNING);
                return stateChanged;
            }
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
        return false;
    }

    @Override
    @Transactional
    public boolean terminate(JsonMapObject jsonmapobject) {
        try {
            return changeActivityState(jsonmapobject, SharkConstants.STATE_CLOSED_TERMINATED);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    @Transactional
    public boolean abort(JsonMapObject jsonmapobject) {
        try {
            return changeActivityState(jsonmapobject, SharkConstants.STATE_CLOSED_ABORTED);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

}
