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

import ru.ilb.jfunction.map.accessors.MapAccessor;
import ru.ilb.jfunction.map.accessors.MapAccessorImpl;
import ru.ilb.workflow.entities.ProcessContext;
import ru.ilb.workflow.entities.ProcessContextAccessor;

/**
 *
 * @author slavb
 */
public class ProcessContextAccessorImpl implements ProcessContextAccessor {

    private final MapAccessor accessor;

    public ProcessContextAccessorImpl(ProcessContext context) {
        accessor = new MapAccessorImpl(context.getContext());
    }

    @Override
    public String getStringProperty(String string) {
        return accessor.getStringProperty(string);
    }

}
