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

import java.util.HashMap;
import java.util.Map;
import javax.naming.InitialContext;
import javax.naming.NamingException;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import ru.ilb.filedossier.scripting.SubstitutorTemplateEvaluator;
import ru.ilb.filedossier.scripting.TemplateEvaluator;

/**
 *
 * @author slavb
 */
public class WorkflowUtils {

    private static String WORKFLOW_FORM_RESOURCE_URL = "WORKFLOW_FORM_RESOURCE_URL";

    /**
     * Get url to activity form
     *
     * @param shandle
     * @param procDefId
     * @param procId
     * @param actId
     * @return
     * @throws NamingException
     */
    public static String getActivityFormUrl(WMSessionHandle shandle, String procDefId, String procId, String actId) throws NamingException {
        javax.naming.Context ctx = new InitialContext();
        String defaultActivityFormUrl = (String) ctx.lookup("ru.bystrobank.apps.workflow.activityform.url");
        String activityFormUrl = XPDLUtils.getEAValue(shandle, WORKFLOW_FORM_RESOURCE_URL, procDefId, procId, actId, defaultActivityFormUrl);
        TemplateEvaluator templateEvaluator = new SubstitutorTemplateEvaluator(ctx);
        Map<String, Object> params = new HashMap<>();
        params.put("processInstanceId", procId);
        params.put("activityInstanceId", actId);
        activityFormUrl = templateEvaluator.evaluateStringExpression(activityFormUrl, params);
        return activityFormUrl;

    }

}
