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
import ru.ilb.jfunction.map.converters.ObjectMapToSerializedMapFunction;
import ru.ilb.workflow.entities.ProcessContext;

/**
 *
 * @author slavb
 */
public class SerializedContextAccessor implements ProcessContext {

    private final ProcessContext delegate;

    public SerializedContextAccessor(ProcessContext delegate) {
        this.delegate = delegate;
    }

    @Override
    public Map<String, Object> getContext() {
        return ObjectMapToSerializedMapFunction.INSTANCE.apply(delegate.getContext(), delegate.getContextSignature());
    }

    @Override
    public void setContext(Map<String, Object> context) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public Map<String, String> getContextSignature() {
        return delegate.getContextSignature();
    }

}
