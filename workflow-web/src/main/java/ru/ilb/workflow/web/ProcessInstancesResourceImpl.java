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
import ru.ilb.workflow.api.ProcessInstanceResource;
import ru.ilb.workflow.api.ProcessInstancesResource;
import ru.ilb.workflow.core.AssignmentFilterCode;
import ru.ilb.workflow.mappers.ActivityInstanceMapper;
import ru.ilb.workflow.mappers.ProcessInstanceMapper;
import ru.ilb.workflow.session.AuthorizationHandler;
import ru.ilb.workflow.session.SessionDataProvider;
import ru.ilb.workflow.utils.ExceptionUtils;
import ru.ilb.workflow.utils.HTTPUtils;
import ru.ilb.workflow.utils.SharkUtils;
import ru.ilb.workflow.utils.WAPIUtils;
import ru.ilb.workflow.utils.WorkflowUtils;
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

    @Override
    public ProcessInstanceResource getProcessInstanceResource(String processInstanceId) {
        ProcessInstanceResource resource = new ProcessInstanceResourceImpl(sessionDataProvider.getSessionData().getSessionHandleSupplier(), processInstanceId);
        applicationContext.getAutowireCapableBeanFactory().autowireBean(resource);
        return resourceContext.initResource(resource);
    }

    @Override
    @Transactional
    public ProcessInstances getProcessInstances(Boolean open, String packageId, String versionId, String processDefinitionId) {
        try {
            WMSessionHandle shandle = sessionDataProvider.getSessionData().getSessionHandleSupplier().get();
            WMProcessInstance[] wmProcessInstances = WAPIUtils.getProcessInstances(shandle, open, packageId, versionId, processDefinitionId);
            return processInstanceMapper.createWrapperFromEntities(Arrays.asList(wmProcessInstances));
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }

    }

    @Override
    @Transactional
    public String createProcessInstance(String packageId, String versionId, String processDefinitionId, JsonMapObject jsonmapobject) {
        try {
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            WMSessionHandle shandle = sessionDataProvider.getSessionData().getSessionHandleSupplier().get();
            WMProcessDefinition wmProcessDefinition = WAPIUtils.getProcessDefinitions(shandle, true, packageId, versionId, processDefinitionId)[0];

            String processInstanceId = wapi.createProcessInstance(shandle, wmProcessDefinition.getName(), null);
            // update variables if set
            if (jsonmapobject != null && !jsonmapobject.asMap().isEmpty()) {
                SharkUtils.updateProcessInfo(shandle, processInstanceId, jsonmapobject.asMap());
            }
            wapi.startProcess(shandle, processInstanceId);
            return processInstanceId;
        } catch (ToolAgentGeneralException ex) {
            throw ExceptionUtils.exceptionConverter(ex);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }

    }

    @Override
    @Transactional
    public ActivityInstance createProcessInstanceAndNext(String packageId, String versionId, String processDefinitionId, JsonMapObject jsonmapobject) {
        String processInstanceId = createProcessInstance(packageId, versionId, processDefinitionId, jsonmapobject);
        ActivityInstance nextActivityInstance = null;
        WMSessionHandle shandle = sessionDataProvider.getSessionData().getSessionHandleSupplier().get();
        WMActivityInstance nextAct = WAPIUtils.findNextActivity(shandle, AuthorizationHandler.getAuthorisedUser(), processInstanceId);
        if (nextAct != null) {
            nextActivityInstance = activityInstanceMapper.createFromEntity(nextAct);
        }
        return nextActivityInstance;
    }

    @Override
    @Transactional
    public ActivityInstances getWorkList(AssignmentFilterCode assignment, Integer limit) {
        try {
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            WMSessionHandle shandle = sessionDataProvider.getSessionData().getSessionHandleSupplier().get();
            ActivityFilterBuilder fb = SharkInterfaceWrapper.getShark().getActivityFilterBuilder();
            List<WMFilter> filters = new ArrayList<>();
            filters.add(fb.addStateStartsWith(shandle, SharkConstants.STATEPREFIX_OPEN));
            if (assignment != null) {
                filters.add(fb.addHasAssignmentForUser(shandle, sessionDataProvider.getSessionData().getAuthorisedUser(), WAPIUtils.acceptedStatus(assignment.value())));
            }
            WMFilter filter = fb.andForArray(shandle, filters.toArray(new WMFilter[filters.size()]));
            if (limit!=null) {
                fb.setLimit(shandle, filter, limit);
            }
            WMActivityInstance[] entities = wapi.listActivityInstances(shandle, filter, false).getArray();
            return activityInstanceMapper.createWrapperFromEntities(Arrays.asList(entities));
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

}
