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
import ru.ilb.workflow.entities.ActivityDefinition;
import ru.ilb.workflow.entities.ProcessContext;

/**
 *
 * @author slavb
 */
public class ActivityContextImpl implements ProcessContext {

    private final ProcessContext processContext;

    private final ActivityDefinition activityDefinition;

    private Map<String, Object> context;
    private Map<String, String> contextSignature;

    public ActivityContextImpl(ProcessContext processContext, ActivityDefinition activityDefinition) {
        this.processContext = processContext;
        this.activityDefinition = activityDefinition;
    }

    @Override
    public Map<String, Object> getContext() {
        if (context == null) {
            context = new HashMap<>(processContext.getContext());
            Map<String, Boolean> activityVariables = activityDefinition.getActivityVariables();
            context.entrySet().removeIf(e -> !activityVariables.containsKey(e.getKey()));

        }
        return context;
    }

    @Override
    public Map<String, String> getContextSignature() {
        if (contextSignature == null) {
            contextSignature = new HashMap<>(processContext.getContextSignature());
            Map<String, Boolean> activityVariables = activityDefinition.getActivityVariables();
            contextSignature.entrySet().removeIf(e -> !activityVariables.containsKey(e.getKey()));
        }
        return contextSignature;
    }

}
