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
package ru.ilb.workflow.toolagent;

import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.client.wfservice.WMEntity;
import org.enhydra.shark.api.internal.toolagent.AppParameter;
import org.enhydra.shark.api.internal.toolagent.ApplicationBusy;
import org.enhydra.shark.api.internal.toolagent.ApplicationNotDefined;
import org.enhydra.shark.api.internal.toolagent.ApplicationNotStarted;
import static org.enhydra.shark.api.internal.toolagent.ToolAgent.APP_STATUS_FINISHED;
import static org.enhydra.shark.api.internal.toolagent.ToolAgent.APP_STATUS_INVALID;
import static org.enhydra.shark.api.internal.toolagent.ToolAgent.APP_STATUS_RUNNING;
import org.enhydra.shark.api.internal.toolagent.ToolAgentGeneralException;
import org.enhydra.shark.toolagent.AbstractToolAgent;

/**
 *
 * @author slavb
 */
public class WebClientToolAgent extends AbstractToolAgent {

    public static final long APP_MODE_SYNCHRONOUS = 0;

    public static final long APP_MODE_ASYNCHRONOUS = 1;

    @Override
    public void invokeApplication(WMSessionHandle shandle, long handle, WMEntity appInfo, WMEntity toolInfo, String applicationName, String procInstId, String assId, AppParameter[] parameters, Integer appMode) throws ApplicationNotStarted, ApplicationNotDefined, ApplicationBusy, ToolAgentGeneralException {
        super.invokeApplication(shandle, handle, appInfo, toolInfo, applicationName, procInstId, assId, parameters, appMode);
        try {
            status = APP_STATUS_RUNNING;

            if (appName == null || appName.trim().length() == 0) {
                readParamsFromExtAttributes((String) parameters[0].the_value);
            }

            cus.info(shandle, "appName = " + appName + " appMode = " + appMode + " appInfo=" + appInfo + " toolInfo=" + toolInfo);

//            if (appMode != null && appMode.intValue() == APP_MODE_SYNCHRONOUS) {
//            }
            status = APP_STATUS_FINISHED;

        } catch (Throwable ex) {
            status = APP_STATUS_INVALID;
            cus.error(shandle, "WebClientToolAgent - application "
                    + appName + " terminated incorrectly for [process="
                    + procInstId + ",assignment=" + assId + "]:" + ex);
            throw new ToolAgentGeneralException(ex);
        }
    }

}
