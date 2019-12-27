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
package ru.ilb.workflow.core;

import java.util.Map;
import java.util.Objects;
import java.util.function.Supplier;
import javax.inject.Inject;
import javax.inject.Named;
import org.enhydra.shark.api.client.wfmc.wapi.WAPI;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import ru.ilb.workflow.entities.ProcessDefinition;
import ru.ilb.workflow.entities.ProcessDefinitionFactory;
import ru.ilb.workflow.entities.ProcessInstance;
import ru.ilb.workflow.entities.ProcessInstanceFactory;
import ru.ilb.workflow.utils.SharkUtils;

@Named
public class ProcessInstanceFactoryImpl implements ProcessInstanceFactory {

    private final Supplier<SessionData> sessionHandleSupplier;

    private final ProcessDefinitionFactory processDefinitionFactory;

    @Inject
    public ProcessInstanceFactoryImpl(Supplier<SessionData> sessionHandleSupplier, ProcessDefinitionFactory processDefinitionFactory) {
        this.sessionHandleSupplier = sessionHandleSupplier;
        this.processDefinitionFactory = processDefinitionFactory;
    }

    @Override
    public ProcessInstance getProcessInstance(String processInstanceId) {
        return new ProcessInstanceImpl(sessionHandleSupplier.get(), processInstanceId);
    }

    @Override
    public ProcessInstance createProcessInstance(String packageId, String versionId, String processDefinitionId, Map<String, Object> context) {
        Objects.requireNonNull(processDefinitionId, "processDefinitionId required");
        ProcessDefinition processDefinition = processDefinitionFactory.getProcessDefinitions(true, packageId, versionId, processDefinitionId)
                .findFirst()
                .orElseThrow(() -> new IllegalArgumentException("Process definition not found [packageId=" + packageId + " versionId=" + versionId + " processDefinitionId=" + processDefinitionId));
        return createProcessInstance(processDefinition, context);
    }

    @Override
    public ProcessInstance createProcessInstance(ProcessDefinition processDefinition, Map<String, Object> context) {
        try {
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            WMSessionHandle shandle = sessionHandleSupplier.get().getSessionHandle();

            String processInstanceId = wapi.createProcessInstance(shandle, processDefinition.getName(), null);
            // update variables if set
            // TODO move to ProcessInstance
            if (context != null && !context.isEmpty()) {
                SharkUtils.updateProcessInfo(shandle, processInstanceId, context);
            }

            return new ProcessInstanceImpl(sessionHandleSupplier.get(), processInstanceId);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

}
