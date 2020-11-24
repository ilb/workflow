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

import java.util.Iterator;
import java.util.Map;
import org.enhydra.shark.Shark;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.client.wfmodel.WfProcess;
import org.enhydra.shark.api.client.wfservice.SharkConnection;
import ru.ilb.workflow.entities.ProcessContext;
import ru.ilb.workflow.entities.ProcessContextAccessor;

/**
 *
 * @author slavb
 */
public class ProcessContextImpl implements ProcessContext {

    private final WMSessionHandle shandle;

    private final SharkConnection sc;

    private final WfProcess processInstance;

    private final String processInstanceId;

    private Map<String, Object> context;
    private Map<String, String> contextSignature;

    private ProcessContextAccessor accessor;

    public ProcessContextImpl(WMSessionHandle shandle, String processInstanceId) {
        try {
            this.shandle = shandle;
            sc = Shark.getInstance().getSharkConnection();
            sc.attachToHandle(shandle);
            processInstance = sc.getProcess(processInstanceId);
            this.processInstanceId = processInstanceId;
        } catch (Exception ex) {
            throw new WorkflowException(ex);
        }
    }

    @Override
    public Map<String, Object> getContext() {
        if (context == null) {
            try {
                context = processInstance.process_context();
            } catch (Exception ex) {
                throw new WorkflowException(ex);
            }
        }
        return context;
    }

    @Override
    public Map<String, String> getContextSignature() {
        if (contextSignature == null) {
            try {
                contextSignature = processInstance.manager().context_signature();
            } catch (Exception ex) {
                throw new WorkflowException(ex);
            }
        }
        return contextSignature;
    }

    @Override
    public void setContext(Map<String, Object> context) {
        try {
            updateProcessVariables(shandle, processInstanceId, context);
        } catch (Exception ex) {
            throw new WorkflowException(ex);
        }
    }

    @Override
    public ProcessContextAccessor accessor() {
        if (accessor == null) {
            accessor = new ProcessContextAccessorImpl(this);
        }
        return accessor;
    }

    private static void updateProcessVariables(WMSessionHandle shandle, String procId, Map vars) throws Exception {
        SharkConnection sc = Shark.getInstance().getSharkConnection();
        sc.attachToHandle(shandle);

        WfProcess process = sc.getProcess(procId);
        Map pcnt = process.process_context();
        filterNonExistingNullVars(vars, pcnt);
        process.set_process_context(vars);
    }

    private static void filterNonExistingNullVars(Map toUpdate, Map currentVars) throws Exception {
        if (toUpdate != null && currentVars != null) {
            Iterator it = toUpdate.entrySet().iterator();
            while (it.hasNext()) {
                Map.Entry me = (Map.Entry) it.next();
                if (me.getValue() == null && !currentVars.containsKey(me.getKey())) {
                    it.remove();
                }
            }
        }
    }

}
