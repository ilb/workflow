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
import org.enhydra.shark.Shark;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.client.wfmodel.WfProcess;
import org.enhydra.shark.api.client.wfservice.SharkConnection;
import ru.ilb.jsonschema.utils.JsonMapMarshaller;
import ru.ilb.jsonschema.utils.JsonTypeMarshaller;
import ru.ilb.workflow.entities.ProcessContext;

/**
 *
 * @author slavb
 */
public class ProcessContextImpl implements ProcessContext {

    private final WMSessionHandle shandle;

    private final SharkConnection sc;

    private final WfProcess processInstance;

    private Map<String, Object> processContext;
    private Map<String, String> contextSignature;

    public ProcessContextImpl(WMSessionHandle shandle, String processInstanceId) {
        try {
            this.shandle = shandle;
            sc = Shark.getInstance().getSharkConnection();
            sc.attachToHandle(shandle);
            processInstance = sc.getProcess(processInstanceId);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    private Map<String, Object> getProcessContext() {
        if (processContext == null) {
            try {
                processContext = processInstance.process_context();
            } catch (Exception ex) {
                throw new RuntimeException(ex);
            }
        }
        return processContext;
    }

    private Map<String, String> getContextSignature() {
        if (contextSignature == null) {
            try {
                contextSignature = processInstance.manager().context_signature();
            } catch (Exception ex) {
                throw new RuntimeException(ex);
            }
        }
        return contextSignature;
    }


    @Override
    public Object getValue(String name) {
        return getProcessContext().get(name);
    }

    @Override
    public String getStringValue(String name) {
        return JsonTypeMarshaller.toString(getValue(name), getContextSignature().get(name));
    }

    @Override
    public Map<String, Object> asMap() {
        return getProcessContext();
    }

    @Override
    public Map<String, Object> asSerializedMap() {
        return JsonMapMarshaller.marshallMap(getProcessContext(), getContextSignature());
    }

}