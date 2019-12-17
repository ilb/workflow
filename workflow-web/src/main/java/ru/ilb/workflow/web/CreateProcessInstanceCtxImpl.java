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

import java.io.UnsupportedEncodingException;
import java.net.URI;
import java.net.URLDecoder;
import java.util.function.Supplier;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.Response;
import org.apache.cxf.jaxrs.ext.MessageContext;
import org.apache.cxf.jaxrs.json.basic.JsonMapObject;
import org.enhydra.shark.api.client.wfmc.wapi.WMActivityInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.workflow.api.CreateProcessInstanceCtx;
import ru.ilb.workflow.context.ContextConstants;
import ru.ilb.workflow.core.SessionData;
import ru.ilb.workflow.session.AuthorizationHandler;
import ru.ilb.workflow.utils.WAPIUtils;
import ru.ilb.workflow.utils.WorkflowUtils;

public class CreateProcessInstanceCtxImpl implements CreateProcessInstanceCtx {

    private final Supplier<SessionData> sessionHandleSupplier;

    @Context
    protected MessageContext messageContext;

    public CreateProcessInstanceCtxImpl(Supplier<SessionData> sessionHandleSupplier) {
        this.sessionHandleSupplier = sessionHandleSupplier;
    }

    @Override
    @Transactional
    public Response createProcessInstanceCtx(String x_remote_user, String packageId, String versionId, String processDefinitionId, String callId, String callbackUrl, String contextUrl, String callerId) {
        WMSessionHandle shandle = sessionHandleSupplier.get().getSessionHandle();
        String processInstanceId = WAPIUtils.createProcessInstanceCtx(shandle, packageId, versionId, processDefinitionId, callbackUrl, contextUrl);
        WMActivityInstance nextAct = WAPIUtils.findNextActivity(shandle, AuthorizationHandler.getAuthorisedUser(), processInstanceId);
        Response.ResponseBuilder builder = Response.ok(processInstanceId);
        //FIXME реализовать ветку когда активность не найдена. Переход в callback?
        if (nextAct != null) {
            String url = WorkflowUtils.getActivityFormUrl(shandle, null, nextAct.getProcessInstanceId(), nextAct.getActivityDefinitionId(), nextAct.getId());
            builder = Response.seeOther(URI.create(url));
        }

        return builder.build();
    }

}
