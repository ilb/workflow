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
import java.util.Optional;
import javax.inject.Inject;
import javax.ws.rs.core.Response;
import ru.ilb.callcontext.entities.CallContext;
import ru.ilb.callcontext.entities.CallContextFactory;
import ru.ilb.workflow.api.ActivityCallback;
import ru.ilb.workflow.context.ContextConstants;
import ru.ilb.workflow.entities.ActivityInstance;
import ru.ilb.workflow.entities.ProcessInstance;
import ru.ilb.workflow.entities.ProcessInstanceFactory;

public class ActivityCallbackImpl implements ActivityCallback {

    private final ProcessInstanceFactory processInstanceFactory;

    private final CallContextFactory callContextFactory;

    /**
     * Resource uri for relative links
     */
    private final URI resourceUri;

    @Inject
    public ActivityCallbackImpl(ProcessInstanceFactory processInstanceFactory, CallContextFactory callContextFactory, URI resourceUri) {
        this.processInstanceFactory = processInstanceFactory;
        this.callContextFactory = callContextFactory;
        this.resourceUri = resourceUri;
    }

    @Override
    public Response activityCallback(String x_remote_user, String callId, String callerId, URI responseUrl) {
        String processInstanceId = callerId, activityInstanceId = callId;

        ProcessInstance processInstance = processInstanceFactory.getProcessInstance(processInstanceId);

        ActivityInstance activityInstance = processInstance.getActivityInstance(activityInstanceId);

        if (responseUrl != null) {
            CallContext responseContext = callContextFactory.getCallContext(responseUrl);
            activityInstance.getContext().setContext(responseContext.getContext());
        }

        activityInstance.complete();

        Response.ResponseBuilder builder = Response.ok(processInstance.getId());
        String parentContextUrl = processInstance.getContextAccessor().getStringProperty(ContextConstants.CONTEXTURL_VARIABLE);
        if (parentContextUrl != null) {
            CallContext parentContext = callContextFactory.getCallContext(URI.create(parentContextUrl));

            Optional<URI> callbackUri = parentContext.getCallbackUri();

        }
        return builder.build();
    }
}
