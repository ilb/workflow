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

import java.net.URI;
import ru.ilb.workflow.entities.CallContext;

public class CallContextImpl implements CallContext {

    private final String callId;

    private final String callerId;

    private final URI callbackUrl;

    private final URI contextUrl;

    private final URI resultUrl;

    public CallContextImpl(String callId, String callerId, URI callbackUrl, URI contextUrl, URI resultUrl) {
        this.callId = callId;
        this.callbackUrl = callbackUrl;
        this.contextUrl = contextUrl;
        this.callerId = callerId;
        this.resultUrl = resultUrl;
    }

    @Override
    public String getCallId() {
        return callId;
    }

    @Override
    public String getCallerId() {
        return callerId;
    }

    @Override
    public URI getCallbackUrl() {
        return callbackUrl;
    }

    @Override
    public URI getContextUrl() {
        return contextUrl;
    }

    @Override
    public URI getResultUrl() {
        return resultUrl;
    }

}
