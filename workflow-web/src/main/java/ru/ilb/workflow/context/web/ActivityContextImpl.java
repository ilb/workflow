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
import javax.inject.Inject;
import ru.ilb.callcontext.entities.CallContext;
import ru.ilb.callcontext.entities.CallContextFactory;
import ru.ilb.jfunction.map.converters.MapToJsonFunction;
import ru.ilb.jfunction.map.converters.ObjectMapToSerializedMapFunction;
import ru.ilb.workflow.api.ActivityContext;
import ru.ilb.workflow.context.ContextConstants;
import ru.ilb.workflow.entities.ProcessContext;
import ru.ilb.workflow.entities.ProcessInstance;
import ru.ilb.workflow.entities.ProcessInstanceFactory;

public class ActivityContextImpl implements ActivityContext {

    private final ProcessInstanceFactory processContextFactory;

    private final CallContextFactory callContextFactory;

    private final URI resourceUri;

    @Inject
    public ActivityContextImpl(ProcessInstanceFactory processContextFactory, CallContextFactory callContextFactory, URI resourceUri) {
        this.processContextFactory = processContextFactory;
        this.callContextFactory = callContextFactory;
        this.resourceUri = resourceUri;
    }

    @Override
    public String activityContext(String x_remote_user, String callId, String callerId) {
        String processInstanceId = callerId, activityInstanceId = callId;

        ProcessInstance processInstance = processContextFactory.getProcessInstance(processInstanceId);

        ProcessContext activityContext = processInstance.getActivityInstance(activityInstanceId).getContext();

        Map<String, Object> contextData = new HashMap<>();

        String parentContextUrl = processInstance.getContextAccessor().getStringProperty(ContextConstants.CONTEXTURL_VARIABLE);
        if (parentContextUrl != null) {
            CallContext parentContext = callContextFactory.getCallContext(URI.create(parentContextUrl));
            // add parent context to result context
            contextData.putAll(parentContext.getContext());
        }

        Map<String, Object> serializedActivityContext = ObjectMapToSerializedMapFunction.INSTANCE.apply(activityContext.getContext(), activityContext.getContextSignature());
        // add activity context to result context
        contextData.putAll(serializedActivityContext);

        CallContext callContext = callContextFactory.createCallContext(null, contextData);
        //callContext.setCallbackUri(uri);

        String json = MapToJsonFunction.INSTANCE.apply(callContext.getContext());
        return json;
    }

}
