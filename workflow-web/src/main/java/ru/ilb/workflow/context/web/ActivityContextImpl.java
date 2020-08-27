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
import javax.naming.NamingException;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.callcontext.entities.CallContext;
import ru.ilb.callcontext.entities.CallContextFactory;
import ru.ilb.jfunction.map.converters.MapToJsonFunction;
import ru.ilb.jfunction.map.converters.ObjectMapToSerializedMapFunction;
import ru.ilb.workflow.api.ActivityContext;
import ru.ilb.workflow.core.context.ContextConstants;
import ru.ilb.workflow.entities.ActivityInstance;
import ru.ilb.workflow.entities.ProcessContext;
import ru.ilb.workflow.entities.ProcessInstance;
import ru.ilb.workflow.entities.ProcessInstanceFactory;

public class ActivityContextImpl implements ActivityContext {

    private final ProcessInstanceFactory processInstanceFactory;

    private final CallContextFactory callContextFactory;

    /**
     * Resource uri for relative links
     */
    private final URI resourceUri;

    @Inject
    public ActivityContextImpl(ProcessInstanceFactory processInstanceFactory, CallContextFactory callContextFactory, URI resourceUri) {
        this.processInstanceFactory = processInstanceFactory;
        this.callContextFactory = callContextFactory;
        this.resourceUri = resourceUri;
    }

    @Override
    @Transactional
    public String activityContext(String x_remote_user, String callId, String callerId) {
        String processInstanceId = callerId, activityInstanceId = callId;

        ProcessInstance processInstance = processInstanceFactory.getProcessInstance(processInstanceId);
        ActivityInstance activityInstance = processInstance.getActivityInstance(activityInstanceId);

        Map<String, Object> contextData = new HashMap<>();

        String parentContextUrl = processInstance.getContext().accessor().getStringProperty(ContextConstants.CONTEXTURL_VARIABLE);
        if (parentContextUrl != null) {
            CallContext parentContext = callContextFactory.getCallContext(URI.create(parentContextUrl));
            // add parent context to result context
            contextData.putAll(parentContext.getContext());
        }

        Map<String, Object> serializedActivityContext = activityInstance.getSerializedContext().getContext();
        // add activity context to result context
        contextData.putAll(serializedActivityContext);

        CallContext callContext = callContextFactory.createCallContext(null, contextData);
        callContext.setCallbackUri(resourceUri.resolve("activityCallback?callId=" + callId + "&callerId=" + callerId + "&state=closed.completed"));
        callContext.setLink("rollback", resourceUri.resolve("activityCallback?callId=" + callId + "&callerId=" + callerId + "&state=closed.terminated"));

        // FIXME HARDCODE, use code from ActivityFormResourceImpl.getActivityDossier to build dossier link
        callContext.setLink("dossier", URI.create(getWorkflowUri() + "/v2/dossiers/" + processInstanceId + "/correspondence/correspondence/register.json"));
        if (serializedActivityContext.containsKey("organizationUid")) {
            String organizationUid = (String) serializedActivityContext.get("organizationUid");
            callContext.setLink("organization", URI.create(getOrganizationsUri() + "/data/" + organizationUid + ".json"));
        }
        String json = callContext.getContextJson();
        return json;
    }

    private static String getWorkflowUri() {
        try {
            return (String) new javax.naming.InitialContext().lookup("ru.bystrobank.apps.workflow.ws");
        } catch (NamingException ex) {
            throw new RuntimeException(ex);
        }
    }

    private static String getOrganizationsUri() {
        try {
            return (String) new javax.naming.InitialContext().lookup("ru.bystrobank.apps.organizations.ws");
        } catch (NamingException ex) {
            throw new RuntimeException(ex);
        }
    }
}
