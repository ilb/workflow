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

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Map;
import javax.inject.Inject;
import javax.ws.rs.Path;
import javax.ws.rs.core.Response;
import org.apache.cxf.jaxrs.json.basic.JsonMapObject;
import static org.apache.tomcat.jni.User.username;
import org.enhydra.shark.api.client.wfmc.wapi.WAPI;
import org.enhydra.shark.api.client.wfmc.wapi.WMActivityInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMFilter;
import org.enhydra.shark.api.client.wfmc.wapi.WMProcessDefinition;
import org.enhydra.shark.api.client.wfmc.wapi.WMProcessInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.common.ActivityFilterBuilder;
import org.enhydra.shark.api.common.SharkConstants;
import org.enhydra.shark.api.internal.toolagent.ToolAgentGeneralException;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import org.springframework.context.ApplicationContext;
import org.springframework.stereotype.Component;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.workflow.api.CreateProcessInstanceCtx;
import ru.ilb.workflow.api.ProcessInstanceResource;
import ru.ilb.workflow.api.ProcessInstancesResource;
import ru.ilb.workflow.context.InitialProcessContextProvider;
import ru.ilb.workflow.core.AcceptedStatus;
import ru.ilb.workflow.mappers.ActivityInstanceMapper;
import ru.ilb.workflow.mappers.ProcessInstanceMapper;
import ru.ilb.workflow.session.AuthorizationHandler;
import ru.ilb.workflow.session.SessionDataProvider;
import ru.ilb.workflow.utils.ExceptionUtils;
import ru.ilb.workflow.utils.SharkUtils;
import ru.ilb.workflow.utils.WAPIUtils;
import ru.ilb.workflow.view.ActivityInstance;
import ru.ilb.workflow.view.ActivityInstances;
import ru.ilb.workflow.view.ProcessInstances;

@Path("processInstances")
@Component
public class ProcessInstancesResourceImpl extends JaxRsContextResource implements ProcessInstancesResource {

    @Inject
    private SessionDataProvider sessionDataProvider;
    @Inject
    private ApplicationContext applicationContext;
    @Inject
    private ProcessInstanceMapper processInstanceMapper;
    @Inject
    private ActivityInstanceMapper activityInstanceMapper;

    @Inject
    private InitialProcessContextProvider initialProcessContextProvider;

    @Override
    public ProcessInstanceResource getProcessInstanceResource(String x_remote_user, String processInstanceId) {
        ProcessInstanceResource resource = new ProcessInstanceResourceImpl(sessionDataProvider, processInstanceId);
        applicationContext.getAutowireCapableBeanFactory().autowireBean(resource);
        return resourceContext.initResource(resource);
    }

    @Override
    public CreateProcessInstanceCtx getCreateProcessInstanceCtx() {
        CreateProcessInstanceCtx resource = new CreateProcessInstanceCtxImpl(sessionDataProvider);
        applicationContext.getAutowireCapableBeanFactory().autowireBean(resource);
        return resourceContext.initResource(resource);
    }

    @Override
    @Transactional
    public ProcessInstances getProcessInstances(String x_remote_user, Boolean open, String packageId, String versionId, String processDefinitionId) {
        try {
            WMSessionHandle shandle = sessionDataProvider.get().getSessionHandle();
            WMProcessInstance[] wmProcessInstances = WAPIUtils.getProcessInstances(shandle, open, packageId, versionId, processDefinitionId);
            return processInstanceMapper.createWrapperFromEntities(Arrays.asList(wmProcessInstances));
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }

    }

    @Override
    @Transactional
    public String createProcessInstance(String x_remote_user, String packageId, String versionId, String processDefinitionId, JsonMapObject jsonmapobject) {
        WMSessionHandle shandle = sessionDataProvider.get().getSessionHandle();
        Map<String, Object> contextData = jsonmapobject.asMap();
        contextData.putAll(initialProcessContextProvider.getContextData());
        return WAPIUtils.createProcessInstance(shandle, packageId, versionId, processDefinitionId, contextData);
    }

    @Override
    @Transactional
    public ActivityInstance createProcessInstanceAndNext(String x_remote_user, String packageId, String versionId, String processDefinitionId, JsonMapObject jsonmapobject) {
        String processInstanceId = createProcessInstance(x_remote_user, packageId, versionId, processDefinitionId, jsonmapobject);
        ActivityInstance nextActivityInstance = null;
        WMSessionHandle shandle = sessionDataProvider.get().getSessionHandle();
        WMActivityInstance nextAct = WAPIUtils.findNextActivity(shandle, AuthorizationHandler.getAuthorisedUser(), processInstanceId);
        if (nextAct != null) {
            nextActivityInstance = activityInstanceMapper.createFromEntity(nextAct);
        }
        return nextActivityInstance;
    }

    @Override
    @Transactional
    public ActivityInstances getWorkList(String x_remote_user, AcceptedStatus assignment, Integer limit) {
        try {
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            WMSessionHandle shandle = sessionDataProvider.get().getSessionHandle();
            ActivityFilterBuilder fb = SharkInterfaceWrapper.getShark().getActivityFilterBuilder();
            List<WMFilter> filters = new ArrayList<>();
            filters.add(fb.addStateStartsWith(shandle, SharkConstants.STATEPREFIX_OPEN));
            if (assignment != null) {
                filters.add(fb.addHasAssignmentForUser(shandle, sessionDataProvider.getSessionData().getAuthorisedUser(), WAPIUtils.acceptedStatus(assignment.value())));
            }
            WMFilter filter = fb.andForArray(shandle, filters.toArray(new WMFilter[filters.size()]));
            if (limit != null) {
                fb.setLimit(shandle, filter, limit);
            }
            WMActivityInstance[] entities = wapi.listActivityInstances(shandle, filter, false).getArray();
            return activityInstanceMapper.createWrapperFromEntities(Arrays.asList(entities));
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

}
