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
import java.util.Map;
import javax.inject.Inject;
import ru.ilb.callcontext.entities.CallContext;
import ru.ilb.callcontext.entities.CallContextFactory;
import ru.ilb.jfunction.map.converters.MapToJsonFunction;
import ru.ilb.jfunction.map.converters.ObjectMapToSerializedMapFunction;
import ru.ilb.workflow.api.ActivityContext;
import ru.ilb.workflow.context.ContextConstants;
import ru.ilb.workflow.entities.ProcessContext;
import ru.ilb.workflow.entities.ProcessContextFactory;
import ru.ilb.workflow.entities.ProcessInstance;


public class ActivityContextImpl implements ActivityContext {

    private final ProcessContextFactory processContextFactory;

    private final CallContextFactory callContextFactory;

    @Inject
    public ActivityContextImpl(ProcessContextFactory processContextFactory, CallContextFactory callContextFactory) {
        this.processContextFactory = processContextFactory;
        this.callContextFactory = callContextFactory;
    }

    @Override
    public String activityContext(String x_remote_user, String callId, String callerId) {
        String processInstanceId = callerId, activityInstanceId = callId;

        ProcessInstance processInstance = processContextFactory.getProcessInstance(processInstanceId);

        ProcessContext activityContext = processInstance.getActivityInstance(activityInstanceId).getContext();

        String contextUrl = processInstance.getContextAccessor().getStringProperty(ContextConstants.CONTEXTURL_VARIABLE);


        CallContext callContext = callContextFactory.getCallContext(URI.create(contextUrl));

        // add activity context to supplied context
        callContext.getContext().putAll(activityContext.getContext());

        Map<String, Object> serializedContext = ObjectMapToSerializedMapFunction.INSTANCE.apply(activityContext.getContext(), activityContext.getContextSignature());
        String json = MapToJsonFunction.INSTANCE.apply(serializedContext);
        return json;
    }

}
