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

import java.util.HashMap;
import java.util.Map;
import ru.ilb.workflow.entities.ProcessContext;

/**
 *
 * @author slavb
 */
public class ProcessContextMock implements ProcessContext {

    final Map<String, Object> context;

    final Map<String, String> contextSignature;

    public ProcessContextMock(Map<String, Object> context) {
        this.context = context;
        this.contextSignature = new HashMap<>();
        context.entrySet().forEach((entry) -> {
            contextSignature.put(entry.getKey(), entry.getValue().getClass().getCanonicalName());
        });
    }
    public ProcessContextMock(Map<String, Object> context, Map<String, String> contextSignature) {
        this.context = context;
        this.contextSignature = contextSignature;
    }

    @Override
    public Map<String, Object> getContext() {
        return context;
    }

    @Override
    public Map<String, String> getContextSignature() {
        return contextSignature;
    }

}
