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
package ru.ilb.workflow.utils;

import java.io.UnsupportedEncodingException;
import java.net.URLEncoder;
import java.util.HashMap;
import java.util.Map;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.naming.Context;
import javax.naming.InitialContext;
import javax.naming.NamingException;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import ru.ilb.filedossier.scripting.SubstitutorTemplateEvaluator;
import ru.ilb.filedossier.scripting.TemplateEvaluator;
import ru.ilb.workflow.core.ProcessContextImpl;
import ru.ilb.workflow.core.context.ContextConstants;
import ru.ilb.workflow.entities.ProcessContext;

/**
 *
 * @author slavb
 */
public class WorkflowUtils {

    private static final String WORKFLOW_ACTIVITYFORM = "WORKFLOW_ACTIVITYFORM";
    private static final String WORKFLOW_ACTIVITYAPI = "WORKFLOW_ACTIVITYAPI";

    /**
     * Get url to activity form
     *
     * @param shandle
     * @param processDefinitionId
     * @param processInstanceId
     * @param activityDefinitionId
     * @param activityInstanceId
     * @return
     */
    public static String getActivityFormUrl(WMSessionHandle shandle, String processDefinitionId, String processInstanceId, String activityDefinitionId, String activityInstanceId) {
        javax.naming.Context ctx;
        String defaultActivityFormUrl;
        try {
            ctx = new InitialContext();
            defaultActivityFormUrl = (String) ctx.lookup("ru.bystrobank.apps.workflow.activityform");
        } catch (NamingException ex) {
            throw new RuntimeException(ex);
        }
        String activityFormUrl = XPDLUtils.getEAValue(shandle, WORKFLOW_ACTIVITYFORM, processDefinitionId, processInstanceId, activityInstanceId, defaultActivityFormUrl);
        return paramSubstitution(shandle, ctx, activityFormUrl, processDefinitionId, processInstanceId, activityDefinitionId, activityInstanceId);
    }

    public static String getActivityApiUrl(WMSessionHandle shandle, String processDefinitionId, String processInstanceId, String activityDefinitionId, String activityInstanceId) {
        javax.naming.Context ctx;
        String defaultActivityFormUrl;
        try {
            ctx = new InitialContext();
            defaultActivityFormUrl = (String) ctx.lookup("ru.bystrobank.apps.workflow.activityapi");
        } catch (NamingException ex) {
            throw new RuntimeException(ex);
        }
        String activityFormUrl = XPDLUtils.getEAValue(shandle, WORKFLOW_ACTIVITYAPI, processDefinitionId, processInstanceId, activityInstanceId, defaultActivityFormUrl);
        return paramSubstitution(shandle, ctx, activityFormUrl, processDefinitionId, processInstanceId, activityDefinitionId, activityInstanceId);
    }

    private static String paramSubstitution(WMSessionHandle shandle, Context ctx, String activityFormUrl, String processDefinitionId, String processInstanceId, String activityDefinitionId, String activityInstanceId) {
        TemplateEvaluator templateEvaluator = new SubstitutorTemplateEvaluator(ctx);
        Map<String, Object> params = new HashMap<>();
        //FIXME HARD CODE cut process Id
        if (processDefinitionId == null) {
            processDefinitionId = processInstanceId.substring(processInstanceId.indexOf("_") + 1);
            processDefinitionId = processDefinitionId.substring(processDefinitionId.indexOf("_") + 1);
        }
        ProcessContext processContext = new ProcessContextImpl(shandle, processInstanceId);

        params.put("processDefinitionId", processDefinitionId);
        params.put("activityDefinitionId", activityDefinitionId);
        params.put("processInstanceId", processInstanceId);
        params.put("activityInstanceId", activityInstanceId);
        String activityDefinitionShortId = activityDefinitionId;
        // HARD CODE CUT PROCESS DEF NAME
        if (activityDefinitionId.startsWith(processDefinitionId)) {
            activityDefinitionShortId = activityDefinitionId.substring(processDefinitionId.length() + 1);
        }
        params.put("activityDefinitionShortId", activityDefinitionShortId);
        activityFormUrl = templateEvaluator.evaluateStringExpression(activityFormUrl, params);

        //FIXME HARDCODE URL
        String contextUrl = "https://devel.net.ilb.ru/workflow-web/web/v2/callcontext/activityContext?callerId=" + processInstanceId + "&callId=" + activityInstanceId;
        if (contextUrl != null) {
            try {
                activityFormUrl = activityFormUrl + "&contextUrl=" + URLEncoder.encode(contextUrl, "UTF-8");
            } catch (UnsupportedEncodingException ex) {
                Logger.getLogger(WorkflowUtils.class.getName()).log(Level.SEVERE, null, ex);
            }
        }

        return activityFormUrl;

    }

}
