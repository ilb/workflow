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
package ru.ilb.workflow.stub;

import java.util.Map;
import ru.ilb.workflow.entities.ProcessDefinition;
import ru.ilb.workflow.entities.ProcessInstance;
import ru.ilb.workflow.entities.ProcessInstanceFactory;

/**
 * Strub factory for tests
 * @author slavb
 */
public class ProcessInstanceFactoryMock implements ProcessInstanceFactory{

    ProcessInstance processInstance;

    public ProcessInstanceFactoryMock(ProcessInstance processInstance) {
        this.processInstance = processInstance;
    }

    @Override
    public ProcessInstance getProcessInstance(String processInstanceId) {
        return processInstance;
    }

    @Override
    public ProcessInstance createProcessInstance(String packageId, String versionId, String processDefinitionId, Map<String, Object> context) {
        return processInstance;
    }

    @Override
    public ProcessInstance createProcessInstance(ProcessDefinition processDefinition, Map<String, Object> context) {
        return processInstance;
    }

}
