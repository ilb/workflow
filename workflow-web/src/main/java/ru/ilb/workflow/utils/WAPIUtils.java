/**
 * Copyright (C) 2015 Bystrobank, JSC
 *
 * This program is free software: you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or (at your option) any later
 * version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * this program. If not, see http://www.gnu.org/licenses
 */
package ru.ilb.workflow.utils;

import java.io.UnsupportedEncodingException;
import java.net.URLDecoder;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Objects;
import java.util.logging.Level;
import java.util.logging.Logger;
import org.apache.cxf.jaxrs.json.basic.JsonMapObject;
import org.enhydra.shark.api.client.wfmc.wapi.WAPI;
import org.enhydra.shark.api.client.wfmc.wapi.WMActivityInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMActivityInstanceState;
import org.enhydra.shark.api.client.wfmc.wapi.WMFilter;
import org.enhydra.shark.api.client.wfmc.wapi.WMProcessDefinition;
import org.enhydra.shark.api.client.wfmc.wapi.WMProcessInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.client.wfmc.wapi.WMWorkItem;
import org.enhydra.shark.api.common.ActivityFilterBuilder;
import org.enhydra.shark.api.common.AssignmentFilterBuilder;
import org.enhydra.shark.api.common.ProcessFilterBuilder;
import org.enhydra.shark.api.common.ProcessMgrFilterBuilder;
import org.enhydra.shark.api.common.SharkConstants;
import org.enhydra.shark.api.internal.toolagent.ToolAgentGeneralException;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import org.enhydra.shark.utilities.namevalue.NameValueUtilities;
import ru.ilb.workflow.core.context.ContextConstants;
import ru.ilb.workflow.web.CreateProcessInstanceCtxImpl;

/**
 * TODO: refactor to class instance methods
 *
 * @author slavb
 */
public class WAPIUtils {

    /**
     * TEMP realization
     *
     * @param shandle
     * @param packageId
     * @param versionId
     * @param processDefinitionId
     * @param callbackUrl
     * @param contextUrl
     * @return
     */
    public static String createProcessInstanceCtx(WMSessionHandle shandle, String packageId, String versionId, String processDefinitionId, String callbackUrl, String contextUrl) {
        String processId = null;
        try {
            String contextUrlDecode = URLDecoder.decode(contextUrl, "UTF-8");
            processId = findProcessInstanceCtx(shandle, packageId, versionId, processDefinitionId, callbackUrl, contextUrlDecode);
            if (processId == null) {
                Map<String,Object> processData = new HashMap<>();
                processData.put(ContextConstants.CONTEXTURL_VARIABLE, contextUrlDecode);
                processData.put(ContextConstants.CALLBACKURL_VARIABLE, URLDecoder.decode(callbackUrl, "UTF-8"));
                processId = createProcessInstance(shandle, packageId, versionId, processDefinitionId, processData);
            }
        } catch (UnsupportedEncodingException ex) {
            Logger.getLogger(CreateProcessInstanceCtxImpl.class.getName()).log(Level.SEVERE, null, ex);
        }
        return processId;
    }

    public static String findProcessInstanceCtx(WMSessionHandle shandle, String packageId, String versionId, String processDefinitionId, String callbackUrl, String contextUrl) {
        try {
            ProcessFilterBuilder pfb = SharkInterfaceWrapper.getShark().getProcessFilterBuilder();
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            WMFilter processfilter = pfb.addStateStartsWith(shandle, SharkConstants.STATEPREFIX_OPEN);
            if (packageId != null) {
                processfilter = pfb.and(shandle, processfilter, pfb.addPackageIdEquals(shandle, packageId));
            }
            processfilter = pfb.and(shandle, processfilter, pfb.addProcessDefIdEquals(shandle, processDefinitionId));
            processfilter = pfb.and(shandle, processfilter, pfb.addVariableStringEquals(shandle, ContextConstants.CONTEXTURL_VARIABLE, contextUrl));
            WMProcessInstance[] procsInst = wapi.listProcessInstances(shandle, processfilter, false).getArray();
            String processId = null;
            if (procsInst.length > 0) {
                processId = procsInst[0].getId();
            }
            return processId;

        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    public static String createProcessInstance(WMSessionHandle shandle, String packageId, String versionId, String processDefinitionId, Map<String,Object> processData) {
        Objects.requireNonNull(processDefinitionId, "processDefinitionId required");
        try {

            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            WMProcessDefinition[] wmProcessDefinition = WAPIUtils.getProcessDefinitions(shandle, true, packageId, versionId, processDefinitionId);
            if (wmProcessDefinition.length == 0) {
                throw new IllegalArgumentException("Process definition not found [packageId=" + packageId + " versionId=" + versionId + " processDefinitionId=" + processDefinitionId);
            }

            String processInstanceId = wapi.createProcessInstance(shandle, wmProcessDefinition[0].getName(), null);
            // update variables if set
            if (processData != null && !processData.isEmpty()) {
                SharkUtils.updateProcessInfo(shandle, processInstanceId, processData);
            }
            wapi.startProcess(shandle, processInstanceId);
            return processInstanceId;
        } catch (ToolAgentGeneralException ex) {
            throw ExceptionUtils.exceptionConverter(ex);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }

    }

    public static WMProcessDefinition[] getProcessDefinitions(WMSessionHandle shandle, Boolean enabled, String packageId, String versionId, String processDefinitionId) throws Exception {
        //PackageAdministration pa = SharkInterfaceWrapper.getShark().getPackageAdministration();
        WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();

        ProcessMgrFilterBuilder fb = SharkInterfaceWrapper.getShark().getProcessMgrFilterBuilder();
        List<WMFilter> filters = new ArrayList<>();
        if (enabled != null) {
            if (enabled) {
                filters.add(fb.addIsEnabled(shandle));
            } else {
                filters.add(fb.not(shandle, fb.addIsEnabled(shandle)));
            }
        }
        if (packageId != null) {
            filters.add(fb.addPackageIdEquals(shandle, packageId));
        }
        if (versionId != null) {
            filters.add(fb.addVersionEquals(shandle, versionId));
        }
        if (processDefinitionId != null) {
            filters.add(fb.addProcessDefIdEquals(shandle, processDefinitionId));
        }

        WMFilter filter = null;
        if (!filters.isEmpty()) {
            filter = fb.andForArray(shandle, filters.toArray(new WMFilter[filters.size()]));
        }
        WMProcessDefinition[] mgrs = wapi.listProcessDefinitions(shandle, filter, false).getArray();

        return mgrs;

    }

    public static WMProcessInstance[] getProcessInstances(WMSessionHandle shandle, Boolean open, String packageId, String versionId, String processDefinitionId) throws Exception {
        //PackageAdministration pa = SharkInterfaceWrapper.getShark().getPackageAdministration();
        WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();

        ProcessFilterBuilder fb = SharkInterfaceWrapper.getShark().getProcessFilterBuilder();
        List<WMFilter> filters = new ArrayList<>();
        if (open != null) {
            if (open) {
                filters.add(fb.addStateStartsWith(shandle, SharkConstants.STATEPREFIX_OPEN));
            } else {
                filters.add(fb.addStateStartsWith(shandle, SharkConstants.STATEPREFIX_CLOSED));
            }
        }
        if (packageId != null) {
            filters.add(fb.addPackageIdEquals(shandle, packageId));
        }
        if (versionId != null) {
            filters.add(fb.addVersionEquals(shandle, versionId));
        }
        if (processDefinitionId != null) {
            filters.add(fb.addProcessDefIdEquals(shandle, processDefinitionId));
        }

        WMFilter filter = null;
        if (!filters.isEmpty()) {
            filter = fb.andForArray(shandle, filters.toArray(new WMFilter[filters.size()]));
        }
        WMProcessInstance[] processes = wapi.listProcessInstances(shandle, filter, false).getArray();

        return processes;

    }

    public static WMActivityInstance findNextActivity(WMSessionHandle shandle, String userId, String procId) {

        try {
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            ActivityFilterBuilder fb = SharkInterfaceWrapper.getShark().getActivityFilterBuilder();
            WMFilter f = fb.addProcessIdEquals(shandle, procId);
            f = fb.and(shandle, f, fb.addStateStartsWith(shandle, SharkConstants.STATE_OPEN_NOT_RUNNING_NOT_STARTED));
            WMActivityInstance[] acts = wapi.listActivityInstances(shandle, f, true).getArray();
            WMWorkItem[] ass = null;
            if (NameValueUtilities.convertNameValueArrayToProperties(SharkInterfaceWrapper.getShark().getProperties())
                    .getProperty("SharkKernel.createAssignments", "true")
                    .equals("true")) {
                AssignmentFilterBuilder afb = SharkInterfaceWrapper.getShark().getAssignmentFilterBuilder();
                f = afb.addUsernameEquals(shandle, userId);
                //f = afb.and(shandle, f, afb.addProcessIdEquals(shandle, procId));
                ass = wapi.listWorkItems(shandle, f, true).getArray();
            }

            WMActivityInstance nextAct = null;
            for (WMActivityInstance act : acts) {
                if (act.getState().isClosed()) {
                    continue; //TEMP FIX
                }
                if (ass == null) {
                    nextAct = act;
                    break;
                }
                for (WMWorkItem as : ass) {
                    if (as.getActivityInstanceId().equals(act.getId())) {
                        nextAct = act;
                        break;
                    }
                }
                if (nextAct != null) {
                    break;
                }
            }
            return nextAct;
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    public static Boolean changeActivityState(WMSessionHandle shandle, WMActivityInstance act, String state) throws Exception {
        Boolean changed = false;
        if (state != null) {
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            String procId = act.getProcessInstanceId();
            String actId = act.getId();
            String oldState = act.getState().stringValue();

            if (!oldState.equals(state)) {
                if (oldState.equals(SharkConstants.STATE_OPEN_NOT_RUNNING_NOT_STARTED) && state.equals(SharkConstants.STATE_CLOSED_COMPLETED)) {
                    wapi.changeActivityInstanceState(shandle, procId, actId, WMActivityInstanceState.valueOf(SharkConstants.STATE_OPEN_RUNNING));
                }
                wapi.changeActivityInstanceState(shandle, procId, actId, WMActivityInstanceState.valueOf(state));
                act.setState(WMActivityInstanceState.valueOf(state));
                changed = true;
            }
        }
        return changed;
    }

    public static int acceptedStatus(String acceptedStatus) {
        int valueInt;
        switch (acceptedStatus) {
            case "ACCEPTED_AND_NON_ACCEPTED":
                valueInt = ActivityFilterBuilder.ACCEPTED_AND_NON_ACCEPTED;
                break;
            case "ONLY_NON_ACCEPTED":
                valueInt = ActivityFilterBuilder.ONLY_NON_ACCEPTED;
                break;
            case "ONLY_ACCEPTED":
                valueInt = ActivityFilterBuilder.ONLY_ACCEPTED;
                break;
            default:
                throw new IllegalArgumentException("acceptedStatus values: ACCEPTED_AND_NON_ACCEPTED, ONLY_NON_ACCEPTED,ONLY_ACCEPTED");
        }
        return valueInt;

    }

}
