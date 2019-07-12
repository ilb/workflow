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

import java.util.Arrays;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import javax.naming.InitialContext;
import javax.naming.NamingException;
import javax.ws.rs.WebApplicationException;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.client.wfservice.WMEntity;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import org.enhydra.shark.utilities.wmentity.WMEntityUtilities;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.filedossier.scripting.SubstitutorTemplateEvaluator;
import ru.ilb.filedossier.scripting.TemplateEvaluator;

/**
 *
 * @author slavb
 */
public class WorkflowUtils {

    private static final String WORKFLOW_FORM_RESOURCE_URL = "WORKFLOW_FORM_RESOURCE_URL";

    /**
     * Get url to activity form
     *
     * @param shandle
     * @param procDefId
     * @param procId
     * @param actId
     * @return
     */
    public static String getActivityFormUrl(WMSessionHandle shandle, String procDefId, String procId, String actId) {
        javax.naming.Context ctx;
        String defaultActivityFormUrl;
        try {
            ctx = new InitialContext();
            defaultActivityFormUrl = (String) ctx.lookup("ru.bystrobank.apps.workflow.activityform.url");
        } catch (NamingException ex) {
            throw new RuntimeException(ex);
        }
        String activityFormUrl = XPDLUtils.getEAValue(shandle, WORKFLOW_FORM_RESOURCE_URL, procDefId, procId, actId, defaultActivityFormUrl);
        TemplateEvaluator templateEvaluator = new SubstitutorTemplateEvaluator(ctx);
        Map<String, Object> params = new HashMap<>();
        params.put("processInstanceId", procId);
        params.put("activityInstanceId", actId);
        activityFormUrl = templateEvaluator.evaluateStringExpression(activityFormUrl, params);
        return activityFormUrl;

    }

    @Transactional
    public static void startActivity(WMSessionHandle shandle, String processId, String activityId) throws Exception {
        WMEntity proc = SharkInterfaceWrapper.getShark().getAdminMisc().getProcessDefinitionInfo(null, processId);
        List<WMEntity> acts = Arrays.asList(WMEntityUtilities.getOverallActivities(shandle, SharkInterfaceWrapper.getShark().getXPDLBrowser(), proc));
        WMEntity actdef = null;
        for (WMEntity act : acts) {
            if (act.getId().equals(activityId)) {
                actdef = act;
                break;
            }
        }
        if (actdef == null) {
            throw new WebApplicationException("Этап не найден", 404);
        }
        SharkInterfaceWrapper.getShark().getExecutionAdministration().startActivity(shandle, processId, "", actdef);

    }

}
