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

import java.net.URI;
import java.util.function.Supplier;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.Response;
import org.apache.cxf.jaxrs.ext.MessageContext;
import org.apache.cxf.jaxrs.json.basic.JsonMapObject;
import org.enhydra.shark.api.client.wfmc.wapi.WMActivityInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.workflow.api.CreateProcessInstanceCtx;
import ru.ilb.workflow.context.ContextConstants;
import ru.ilb.workflow.session.AuthorizationHandler;
import ru.ilb.workflow.utils.WAPIUtils;
import ru.ilb.workflow.utils.WorkflowUtils;


public class CreateProcessInstanceCtxImpl implements CreateProcessInstanceCtx {

    private final Supplier<WMSessionHandle> sessionHandleSupplier;

    @Context
    protected MessageContext messageContext;


    public CreateProcessInstanceCtxImpl(Supplier<WMSessionHandle> sessionHandleSupplier) {
        this.sessionHandleSupplier = sessionHandleSupplier;
    }

    @Override
    @Transactional
    public Response createProcessInstanceCtx(String x_remote_user, String packageId, String versionId, String processDefinitionId, String callId, String callbackUrl, String contextUrl, String callerId) {
        JsonMapObject processData = new JsonMapObject();
        processData.setProperty(ContextConstants.CALLID_VARIABLE, callId);
        processData.setProperty(ContextConstants.CALLBACKURL_VARIABLE, callbackUrl);
        processData.setProperty(ContextConstants.CONTEXTURL_VARIABLE, contextUrl);
        processData.setProperty(ContextConstants.CALLID_VARIABLE, callerId);

        WMSessionHandle shandle = sessionHandleSupplier.get();
        String processInstanceId = WAPIUtils.createProcessInstance(shandle, packageId, versionId, processDefinitionId, processData);
        WMActivityInstance nextAct = WAPIUtils.findNextActivity(shandle, AuthorizationHandler.getAuthorisedUser(), processInstanceId);
        Response.ResponseBuilder builder = Response.ok(processInstanceId);
        if (nextAct != null) {
            String url = WorkflowUtils.getActivityFormUrl(shandle, null, nextAct.getProcessInstanceId(), nextAct.getActivityDefinitionId(), nextAct.getId());
            builder.location(URI.create(url));
        }

        return null;
    }

}
