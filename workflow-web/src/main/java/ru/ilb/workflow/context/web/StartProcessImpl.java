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
package ru.ilb.workflow.context.web;

import java.net.URI;
import java.util.HashMap;
import java.util.Map;
import java.util.function.Supplier;
import javax.ws.rs.core.Response;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.callcontext.entities.CallContext;
import ru.ilb.callcontext.entities.CallContextFactory;
import ru.ilb.workflow.api.StartProcess;
import ru.ilb.workflow.context.InitialProcessContextProvider;
import ru.ilb.workflow.core.SessionData;
import ru.ilb.workflow.core.context.ContextConstants;
import ru.ilb.workflow.entities.ActivityInstance;
import ru.ilb.workflow.entities.ProcessInstance;
import ru.ilb.workflow.entities.ProcessInstanceFactory;
import ru.ilb.workflow.salepoint.SalepointProvider;

public class StartProcessImpl implements StartProcess {

    private final ProcessInstanceFactory processInstanceFactory;

    private final CallContextFactory callContextFactory;

    private final Supplier<SessionData> sessionHandleSupplier;

    private final InitialProcessContextProvider initialProcessContextProvider;

    private final URI resourceUri;

    public StartProcessImpl(ProcessInstanceFactory processInstanceFactory, CallContextFactory callContextFactory, Supplier<SessionData> sessionHandleSupplier, InitialProcessContextProvider initialProcessContextProvider, URI resourceUri) {
        this.processInstanceFactory = processInstanceFactory;
        this.callContextFactory = callContextFactory;
        this.sessionHandleSupplier = sessionHandleSupplier;
        this.initialProcessContextProvider = initialProcessContextProvider;
        this.resourceUri = resourceUri;
    }

    @Override
    @Transactional
    public Response startProcess(String x_remote_user, String packageId, String versionId, String processDefinitionId, URI contextUrl) {
        Map<String, Object> contextData = initialProcessContextProvider.getContextData();
        if (contextUrl != null) {
            contextData.put(ContextConstants.CONTEXTURL_VARIABLE, contextUrl.toString());
            CallContext parentContext = callContextFactory.getCallContext(contextUrl);

            //TODO read context to process formal parameters
            //only remove link !FIXME! !HARDCODE!
            parentContext.getContext().remove("link");
            contextData.putAll(parentContext.getContext());
        }
        ProcessInstance processInstance = processInstanceFactory.createProcessInstance(packageId, versionId, processDefinitionId, contextData);
        processInstance.start();

        ActivityInstance nextActivityInstance = processInstance.getNextActivityInstance();

        Response.ResponseBuilder builder = Response.ok(processInstance.getId());
        //FIXME реализовать ветку когда активность не найдена. Переход в callback?
        if (nextActivityInstance != null) {
            builder = Response.seeOther(nextActivityInstance.getActivityFormUrl());
        }
        return builder.build();
    }
}
