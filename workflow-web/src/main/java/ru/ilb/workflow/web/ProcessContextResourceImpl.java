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
package ru.ilb.workflow.web;

import java.util.Map;
import java.util.function.Supplier;
import javax.ws.rs.core.Response;
import org.apache.cxf.jaxrs.json.basic.JsonMapObject;
import org.enhydra.shark.Shark;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.client.wfmodel.WfProcess;
import org.enhydra.shark.api.client.wfservice.SharkConnection;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.jsonschema.utils.JsonMapMarshaller;
import ru.ilb.workflow.api.ProcessContextResource;
import ru.ilb.workflow.core.SessionData;
import ru.ilb.workflow.utils.XPDLUtils;

public class ProcessContextResourceImpl implements ProcessContextResource {

    private final Supplier<SessionData> sessionHandleSupplier;

    private final String processInstanceId;

    private final String activityInstanceId;

    public ProcessContextResourceImpl(Supplier<SessionData> sessionHandleSupplier, String processInstanceId, String activityInstanceId) {
        this.sessionHandleSupplier = sessionHandleSupplier;
        this.processInstanceId = processInstanceId;
        this.activityInstanceId = activityInstanceId;
    }

    @Override
    @Transactional
    public Response getProcessContext() {
        try {
            WMSessionHandle shandle = sessionHandleSupplier.get().getSessionHandle();
            return Response.ok(getProcessContext(shandle, processInstanceId, activityInstanceId)).build();
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    public static JsonMapObject getProcessContext(WMSessionHandle shandle, String processInstanceId, String activityInstanceId) throws Exception {
        SharkConnection sc = Shark.getInstance().getSharkConnection();
        sc.attachToHandle(shandle);
        WfProcess processInstance = sc.getProcess(processInstanceId);
        Map<String, Object> context = processInstance.process_context();
        Map<String, String> contextSignature = processInstance.manager().context_signature();

        //filter activity variables
        if (activityInstanceId != null) {
            Map<String, Boolean> activityVariables = XPDLUtils.getActivityVariables(shandle, processInstanceId, activityInstanceId);
            context.entrySet().removeIf(e -> !activityVariables.containsKey(e.getKey()));
        }

        Map<String, Object> serializedProcessContext = JsonMapMarshaller.marshallMap(context, contextSignature);

        JsonMapObject processContext = new JsonMapObject(serializedProcessContext);
        return processContext;

    }

}
