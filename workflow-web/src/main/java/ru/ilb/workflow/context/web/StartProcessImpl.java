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
import javax.ws.rs.core.Context;
import javax.ws.rs.core.Response;
import org.apache.cxf.jaxrs.ext.MessageContext;
import org.apache.cxf.jaxrs.json.basic.JsonMapObject;
import org.enhydra.shark.api.client.wfmc.wapi.WMActivityInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.workflow.api.StartProcess;
import ru.ilb.workflow.context.ContextConstants;
import ru.ilb.workflow.core.SessionData;
import ru.ilb.workflow.entities.ActivityInstance;
import ru.ilb.workflow.entities.ProcessInstance;
import ru.ilb.workflow.entities.ProcessInstanceFactory;
import ru.ilb.workflow.session.AuthorizationHandler;
import ru.ilb.workflow.utils.WAPIUtils;
import ru.ilb.workflow.utils.WorkflowUtils;

public class StartProcessImpl implements StartProcess {

    private final ProcessInstanceFactory processInstanceFactory;

    private final URI resourceUri;

    public StartProcessImpl(ProcessInstanceFactory processInstanceFactory, URI resourceUri) {
        this.processInstanceFactory = processInstanceFactory;
        this.resourceUri = resourceUri;
    }

    @Override
    @Transactional
    public Response startProcess(String x_remote_user, String packageId, String versionId, String processDefinitionId, URI contextUrl) {
        Map<String, Object> context = new HashMap<>();
        if (contextUrl != null) {
            context.put(ContextConstants.CONTEXTURL_VARIABLE, contextUrl);
        }

        ProcessInstance processInstance = processInstanceFactory.createProcessInstance(packageId, versionId, processDefinitionId, context);
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
