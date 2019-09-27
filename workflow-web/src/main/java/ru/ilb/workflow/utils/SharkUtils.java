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

import java.time.LocalDateTime;
import java.time.ZoneOffset;
import java.util.Arrays;
import java.util.HashMap;
import java.util.Iterator;
import java.util.List;
import java.util.Map;
import javax.ws.rs.WebApplicationException;
import org.enhydra.shark.Shark;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.client.wfmodel.WfActivity;
import org.enhydra.shark.api.client.wfmodel.WfProcess;
import org.enhydra.shark.api.client.wfservice.SharkConnection;
import org.enhydra.shark.api.client.wfservice.WMEntity;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import org.enhydra.shark.utilities.wmentity.WMEntityUtilities;
import org.springframework.transaction.annotation.Transactional;

/**
 *
 * @author slavb
 */
public class SharkUtils {

    /**
     * property for setting process name
     */
    final public static String PROPERTY_NAME = "$name";
    /**
     * property for setting process description
     */
    final public static String PROPERTY_DESCRIPTION = "$description";
    /**
     * property for setting process priority
     */
    final public static String PROPERTY_PRIORITY = "$priority";
    /**
     * property for setting process limit
     */
    final public static String PROPERTY_LIMIT = "$limit";
    final public static Map<String, String> PROPERTY_SIGNATURE = new HashMap<>();

    static {
        PROPERTY_SIGNATURE.put(PROPERTY_NAME, String.class.getCanonicalName());
        PROPERTY_SIGNATURE.put(PROPERTY_DESCRIPTION, String.class.getCanonicalName());
        PROPERTY_SIGNATURE.put(PROPERTY_PRIORITY, Integer.class.getCanonicalName());
        PROPERTY_SIGNATURE.put(PROPERTY_LIMIT, java.sql.Timestamp.class.getCanonicalName());
    }

    public static void updateProcessInfo(WMSessionHandle shandle, String procId, Map<String, Object> procInfo) throws Exception {
        SharkConnection sc = Shark.getInstance().getSharkConnection();
        sc.attachToHandle(shandle);

        if (procInfo != null && procInfo.size() > 0) {
            String proName = (String) procInfo.get(PROPERTY_NAME);
            String proDesc = (String) procInfo.get(PROPERTY_DESCRIPTION);
            Integer proPri = (Integer) procInfo.get(PROPERTY_PRIORITY);
            java.sql.Timestamp limit = (java.sql.Timestamp) procInfo.get(PROPERTY_LIMIT);
            Map<String, Object> variables = new HashMap<>(procInfo);
            // filter special properties
            variables.entrySet().removeIf(e -> PROPERTY_SIGNATURE.containsKey(e.getKey()));

            WfProcess process = sc.getProcess(procId);
            if (proName != null) {
                process.set_name(proName);
            }
            if (proDesc != null) {
                process.set_description(proDesc);
            }
            if (proPri != null) {
                process.set_priority(proPri.shortValue());
            }
            if (limit != null) {
                SharkInterfaceWrapper.getShark().getExecutionAdministration().setProcessLimit(shandle, procId, limit.getTime());
            }
            if (!variables.isEmpty()) {
                updateProcessVariables(shandle, procId, variables);
            }
        }
    }

    public static void updateActivityInfo(WMSessionHandle shandle, String procId, String actId, Map<String, Object> actInfo) throws Exception {
        SharkConnection sc = Shark.getInstance().getSharkConnection();
        sc.attachToHandle(shandle);

        if (actInfo != null && actInfo.size() > 0) {
            String actName = (String) actInfo.get(PROPERTY_NAME);
            String actDesc = (String) actInfo.get(PROPERTY_DESCRIPTION);
            Integer actPri = (Integer) actInfo.get(PROPERTY_PRIORITY);
            LocalDateTime limit = (LocalDateTime) actInfo.get(PROPERTY_LIMIT);
            Map<String, Object> variables = new HashMap<>(actInfo);
            // filter special properties
            variables.entrySet().removeIf(e -> PROPERTY_SIGNATURE.containsKey(e.getKey()));
            WfActivity activity = sc.getActivity(procId, actId);
            if (actName != null) {
                activity.set_name(actName);
            }
            if (actDesc != null) {
                activity.set_description(actDesc);
            }
            if (actPri != null) {
                activity.set_priority(actPri.shortValue());
            }
            if (limit != null) {
                SharkInterfaceWrapper.getShark().getExecutionAdministration().setActivityLimit(shandle, procId, actId, limit.toEpochSecond(ZoneOffset.UTC));
            }

            if (!variables.isEmpty()) {
                updateActivityVariables(shandle, procId, actId, variables);
            }

        }
    }

    private static void updateProcessVariables(WMSessionHandle shandle, String procId, Map vars) throws Exception {
        SharkConnection sc = Shark.getInstance().getSharkConnection();
        sc.attachToHandle(shandle);

        WfProcess process = sc.getProcess(procId);
        Map pcnt = process.process_context();
        filterNonExistingNullVars(vars, pcnt);
        process.set_process_context(vars);
    }

    public static Map<String, String> getContextSignature(WMSessionHandle shandle, String processInstanceId, boolean specialProperties) throws Exception {
        SharkConnection sc = Shark.getInstance().getSharkConnection();
        sc.attachToHandle(shandle);
        WfProcess processInstance = sc.getProcess(processInstanceId);
        Map<String, String> contextSignature = processInstance.manager().context_signature();
        if (specialProperties) {
            contextSignature.putAll(PROPERTY_SIGNATURE);
        }
        return contextSignature;
    }

    private static void updateActivityVariables(WMSessionHandle shandle, String procId, String actId, Map vars) throws Exception {
        SharkConnection sc = Shark.getInstance().getSharkConnection();
        sc.attachToHandle(shandle);

        WfActivity activity = sc.getActivity(procId, actId);
        Map acnt = activity.process_context();
        filterNonExistingNullVars(vars, acnt);
        activity.set_result(vars);
    }

    private static void filterNonExistingNullVars(Map toUpdate, Map currentVars) throws Exception {
        if (toUpdate != null && currentVars != null) {
            Iterator it = toUpdate.entrySet().iterator();
            while (it.hasNext()) {
                Map.Entry me = (Map.Entry) it.next();
                if (me.getValue() == null && !currentVars.containsKey(me.getKey())) {
                    it.remove();
                }
            }
        }
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
