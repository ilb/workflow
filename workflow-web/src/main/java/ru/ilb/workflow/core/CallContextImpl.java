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

import ru.ilb.workflow.context.ContextConstants;
import ru.ilb.workflow.entities.CallContext;
import ru.ilb.workflow.entities.ProcessContext;

public class CallContextImpl implements CallContext {

    private final ProcessContext processContext;

    public CallContextImpl(ProcessContext processContext) {
        this.processContext = processContext;
    }

    @Override
    public String getCallbackUrl() {
        return processContext.getStringValue(ContextConstants.CALLBACKURL_VARIABLE);
    }

    @Override
    public String getCallbackUrlWithParams() {
        String callbackUrl = getCallbackUrl();
        if (callbackUrl != null) {
            StringBuilder sb = new StringBuilder();
            sb.append(callbackUrl);
            sb.append(callbackUrl.contains("?") ? "&" : "?");
            sb.append("callId=");
            sb.append(getCallId());
            sb.append("&resultUrl=");
            sb.append(getResultUrl());
            callbackUrl = sb.toString();
        }
        return callbackUrl;
    }

    @Override
    public String getCallId() {
        return processContext.getStringValue(ContextConstants.CALLID_VARIABLE);
    }

    @Override
    public String getContextUrl() {
        return processContext.getStringValue(ContextConstants.CONTEXTURL_VARIABLE);
    }

    @Override
    public String getCallerId() {
        return processContext.getStringValue(ContextConstants.CALLERID_VARIABLE);
    }

    @Override
    public String getResultUrl() {
        return processContext.getStringValue(ContextConstants.RESULTURL_VARIABLE);
    }

}
