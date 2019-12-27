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

import java.util.HashMap;
import java.util.Map;
import java.util.logging.Level;
import java.util.logging.Logger;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import ru.ilb.workflow.entities.ActivityDefinition;
import ru.ilb.workflow.entities.ActivityInstance;
import ru.ilb.workflow.entities.ProcessContext;
import ru.ilb.workflow.entities.ProcessContextAccessor;
import ru.ilb.workflow.utils.SharkUtils;

/**
 *
 * @author slavb
 */
public class ActivityContextImpl implements ProcessContext {

    private final WMSessionHandle shandle;

    private final ActivityInstance activityInstance;

    private Map<String, Object> context;
    private Map<String, String> contextSignature;

    private ProcessContextAccessor accessor;

    public ActivityContextImpl(WMSessionHandle shandle, ActivityInstance activityInstance) {
        this.shandle = shandle;
        this.activityInstance = activityInstance;
    }

    @Override
    public Map<String, Object> getContext() {
        if (context == null) {
            context = new HashMap<>(activityInstance.getProcessInstance().getContext().getContext());
            Map<String, Boolean> activityVariables = activityInstance.getActivityDefinition().getActivityVariables();
            context.entrySet().removeIf(e -> !activityVariables.containsKey(e.getKey()));

        }
        return context;
    }

    @Override
    public Map<String, String> getContextSignature() {
        if (contextSignature == null) {
            contextSignature = new HashMap<>(activityInstance.getProcessInstance().getContext().getContextSignature());
            Map<String, Boolean> activityVariables = activityInstance.getActivityDefinition().getActivityVariables();
            contextSignature.entrySet().removeIf(e -> !activityVariables.containsKey(e.getKey()));
        }
        return contextSignature;
    }

    @Override
    public void setContext(Map<String, Object> context) {
        Map<String, Boolean> activityVariables = activityInstance.getActivityDefinition().getActivityVariables();
        Map<String, Object> contextCopy = new HashMap<>(context);
        //remove all not existent or readonly variables
        contextCopy.entrySet().removeIf(e -> !Boolean.FALSE.equals(activityVariables.get(e.getKey())));

        try {
            SharkUtils.updateActivityInfo(shandle, activityInstance.getProcessInstance().getId(), activityInstance.getId(), context);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    public ProcessContextAccessor accessor() {
        if (accessor==null) {
            accessor = new ProcessContextAccessorImpl(this);;
        }
        return accessor;

    }

}
