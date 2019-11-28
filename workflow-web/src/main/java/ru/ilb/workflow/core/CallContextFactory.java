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
import javax.inject.Named;
import ru.ilb.workflow.context.ContextConstants;
import ru.ilb.workflow.entities.CallContext;
import ru.ilb.workflow.entities.ProcessContext;

/**
 *
 * @author slavb
 */
@Named
public class CallContextFactory {

    public CallContext createCallContext(ProcessContext processContext) {

        return new CallContextImpl(processContext.getStringValue(ContextConstants.CALLID_VARIABLE),
                processContext.getStringValue(ContextConstants.CALLERID_VARIABLE),
                nullUri(processContext.getStringValue(ContextConstants.CALLBACKURL_VARIABLE)),
                nullUri(processContext.getStringValue(ContextConstants.CONTEXTURL_VARIABLE)),
                nullUri(processContext.getStringValue(ContextConstants.RESULTURL_VARIABLE)));
    }

    private URI nullUri(String url) {
        return url != null && !url.isEmpty() ? URI.create(url) : null;
    }

}
