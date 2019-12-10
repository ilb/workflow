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

import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import ru.ilb.workflow.entities.ActivityDefinition;
import ru.ilb.workflow.entities.ActivityInstance;
import ru.ilb.workflow.entities.ProcessContext;
import ru.ilb.workflow.entities.ProcessInstance;

public class ActivityInstanceImpl implements ActivityInstance {

    private final WMSessionHandle shandle;

    private final ProcessInstance processInstance;

    private final String id;

    private ActivityDefinition activityDefinition;

    private ProcessContext context;

    public ActivityInstanceImpl(WMSessionHandle shandle, ProcessInstance processInstance, String activityInstanceId) {
        this.shandle = shandle;
        this.processInstance = processInstance;
        this.id = activityInstanceId;
    }

    @Override
    public ActivityDefinition getActivityDefinition() {
        if (activityDefinition == null) {
            activityDefinition = new ActivityDefinitionImpl(shandle, processInstance.getId(), id);
        }
        return activityDefinition;
    }

    @Override
    public ProcessContext getContext() {
        if (context == null) {
            context = new ActivityContextImpl(processInstance.getContext(), getActivityDefinition());
        }
        return context;
    }

    @Override
    public String getId() {
        return id;
    }

}
