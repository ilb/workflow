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

import java.util.function.Supplier;
import javax.inject.Inject;
import javax.ws.rs.container.ResourceContext;
import javax.ws.rs.core.Context;
import org.enhydra.shark.api.client.wfmc.wapi.WMProcessDefinition;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.workflow.api.ActivityDefinitionResource;
import ru.ilb.workflow.api.ProcessDefinitionResource;
import ru.ilb.workflow.mappers.ProcessDefinitionMapper;
import ru.ilb.workflow.utils.WAPIUtils;
import ru.ilb.workflow.view.ProcessDefinition;

public class ProcessDefinitionResourceImpl implements ProcessDefinitionResource {

    private final Supplier<WMSessionHandle> sessionHandleSupplier;

    private final String processDefinitionId;

    private final String processInstanceId;

    @Context
    private ResourceContext resourceContext;

    @Inject
    ProcessDefinitionMapper processDefinitionMapper;

    public ProcessDefinitionResourceImpl(Supplier<WMSessionHandle> sessionHandleSupplier, String processInstanceId, String processDefinitionId) {
        this.sessionHandleSupplier = sessionHandleSupplier;
        this.processDefinitionId = processDefinitionId;
        this.processInstanceId = processInstanceId;
    }

    @Override
    @Transactional
    public ProcessDefinition getProcessDefinition() {
        try {
            WMSessionHandle shandle = sessionHandleSupplier.get();
            WMProcessDefinition wmProcessDefinition = WAPIUtils.getProcessDefinitions(shandle, true, null, null, processDefinitionId)[0];
//            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
//            WMProcessDefinition wmProcessDefinition = wapi.getProcessDefinition(shandle, XPDLUtils.getUniqueProcessDefinitionName(shandle, processDefinitionId));
            return processDefinitionMapper.createFromEntity(wmProcessDefinition);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    public ActivityDefinitionResource getActivityDefinitionResource(String activityDefinitionId) {
        return resourceContext.initResource(new ActivityDefinitionResourceImpl(sessionHandleSupplier, processDefinitionId, activityDefinitionId, null));
    }

}
