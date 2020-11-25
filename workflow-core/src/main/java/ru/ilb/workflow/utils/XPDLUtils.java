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

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.List;
import java.util.Map;
import java.util.stream.Collectors;
import java.util.stream.Stream;
import org.enhydra.jawe.JaWEManager;
import org.enhydra.jxpdl.XMLCollectionElement;
import org.enhydra.jxpdl.XMLComplexElement;
import org.enhydra.jxpdl.XMLUtil;
import org.enhydra.jxpdl.elements.Responsible;
import org.enhydra.jxpdl.elements.WorkflowProcess;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.client.wfservice.AdminMisc;
import org.enhydra.shark.api.client.wfservice.WMEntity;
import org.enhydra.shark.api.client.wfservice.XPDLBrowser;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import org.enhydra.shark.utilities.wmentity.WMEntityUtilities;
import org.enhydra.shark.webclient.business.prof.graph.JaWEUtil;
import ru.ilb.jfunction.map.MapCollectors;

/**
 *
 * @author slavb
 */
public final class XPDLUtils {

    private static final String EA_VAR_TO_PROCESS = "VariableToProcess_";
//    private static final String EA_VAR_TO_PROCESS_UPDATE = "VariableToProcess_UPDATE";
    private static final String EA_VAR_TO_PROCESS_VIEW = "VariableToProcess_VIEW";

    private XPDLUtils() {
    }

    /**
     * getProcessDefinitionId
     *
     * @param shandle
     * @param processDefinitionId
     * @return
     * @throws Exception
     */
    public static String getUniqueProcessDefinitionName(WMSessionHandle shandle, String processDefinitionId) throws Exception {
        XPDLBrowser xpdlb = SharkInterfaceWrapper.getShark().getXPDLBrowser();
        String[] parts = processDefinitionId.split("#");
        String pkgId;
        String pkgVer;
        String pDefId;
        switch (parts.length) {
            case 2:
                pkgId = parts[0];
                pkgVer = "";
                pDefId = parts[1];
                break;
            case 3:
                pkgId = parts[0];
                pkgVer = parts[1];
                pDefId = parts[2];
                break;
            default:
                throw new IllegalArgumentException("Allowed format: pkgId#pDefId or pkgId#pkgVer#pDefId");
        }
        return xpdlb.getUniqueProcessDefinitionName(shandle, pkgId, pkgVer, pDefId);
    }

    public static WorkflowProcess getWorkflowProcess(WMSessionHandle shandle, String processId, String uniqueDefId) throws Exception {
        AdminMisc adminMisc = SharkInterfaceWrapper.getShark().getAdminMisc();
        WMEntity ent = null;
        if (processId != null) {
            ent = adminMisc.getProcessDefinitionInfo(shandle, processId);
        } else {
            ent = adminMisc.getProcessDefinitionInfoByUniqueProcessDefinitionName(shandle,
                    uniqueDefId);
        }

        org.enhydra.jxpdl.elements.Package packag = JaWEManager.getInstance()
                .getXPDLHandler()
                .getPackageByIdAndVersion(ent.getPkgId(), ent.getPkgVer());

        if (packag == null) {
            JaWEUtil.insertPackage(shandle, ent.getPkgId(), ent.getPkgVer());
        }
        packag = JaWEManager.getInstance()
                .getXPDLHandler()
                .getPackageByIdAndVersion(ent.getPkgId(), ent.getPkgVer());
        if (packag == null) {
            throw new RuntimeException("Didn't find package for a "
                    + ((processId != null) ? ("process " + processId)
                            : ("definition " + uniqueDefId))
                    + " !!!");
        }

        WorkflowProcess wp = packag.getWorkflowProcess(ent.getId());
        return wp;
    }

    /**
     * @see WfActivityImpl.findUsers
     * @param shandle
     * @param processId
     * @param uniqueDefId
     * @return
     * @throws Exception
     */
    public static List<String> getResponsibles(WMSessionHandle shandle, String processId, String uniqueDefId) throws Exception {
        WorkflowProcess workflowProcess = getWorkflowProcess(shandle, processId, uniqueDefId);
        List resps = XMLUtil.getResponsibles(workflowProcess);
        Iterator it = resps.iterator();
        List<String> responsibles = new ArrayList<>();
        while (it.hasNext()) {
            Responsible resp = (Responsible) it.next();
            responsibles.add(resp.toValue());
        }
        return responsibles;
    }

    /**
     * Get activity extended attributes pairs from XPDL
     *
     * @param shandle
     * @param processId
     * @param activityId
     * @return
     * @throws Exception
     */
    public static Map<String, String> getActivityExtendedAttributes(WMSessionHandle shandle, String processId, String activityId) throws Exception {
        AdminMisc am = SharkInterfaceWrapper.getShark().getAdminMisc();
        WMEntity actEnt = am.getActivityDefinitionInfo(shandle, processId, activityId);

        String[][] extAttribs = WMEntityUtilities.getExtAttribNVPairs(shandle, SharkInterfaceWrapper.getShark().getXPDLBrowser(), actEnt);
        Map<String, String> result = Stream.of(extAttribs)
                .collect(Collectors.toMap(extAttrib -> extAttrib[0], extAttrib -> extAttrib[1]));

        return result;

    }

    /**
     * get activity configured variables with value as readonly state
     *
     * @param shandle
     * @param processId
     * @param activityId
     * @return
     * @throws Exception
     */
    public static Map<String, Boolean> getActivityVariables(WMSessionHandle shandle, String processId, String activityId) throws Exception {

        AdminMisc am = SharkInterfaceWrapper.getShark().getAdminMisc();
        WMEntity actEnt = am.getActivityDefinitionInfo(shandle, processId, activityId);

        String[][] extAttribs = WMEntityUtilities.getExtAttribNVPairs(shandle, SharkInterfaceWrapper.getShark().getXPDLBrowser(), actEnt);

        Map<String, Boolean> result = Stream.of(extAttribs)
                .filter(extAttrib -> extAttrib[0].startsWith(EA_VAR_TO_PROCESS))
                .collect(MapCollectors.toLinkedMap(extAttrib -> extAttrib[1], extAttrib -> extAttrib[0].equals(EA_VAR_TO_PROCESS_VIEW)));
        return result;
    }

    public static Map<String, String> getVariableExtendedAttributes(WorkflowProcess wp, String varId) {
        return getExtendedAttributes(getVariable(wp, varId));
    }

    public static Map<String, String> getDataFields(WorkflowProcess wp) {
        Map<String, XMLCollectionElement> map = wp.getAllVariables();
        return map.entrySet().stream().collect(
                Collectors.toMap(
                        e -> e.getKey(),
                        e -> e.getValue().get("Name").toValue())
        );
    }

    static XMLCollectionElement getVariable(WorkflowProcess wp, String varId) {
        Map m = wp.getAllVariables();
        return (XMLCollectionElement) m.get(varId);
    }

    static Map<String, String> getExtendedAttributes(XMLComplexElement xpdldef) {
        Map result = new HashMap<>();
        org.enhydra.jxpdl.elements.ExtendedAttributes eas = (org.enhydra.jxpdl.elements.ExtendedAttributes) xpdldef.get("ExtendedAttributes");
        if (eas != null) {
            Iterator it = eas.toElements().iterator();
            while (it.hasNext()) {
                org.enhydra.jxpdl.elements.ExtendedAttribute ea = (org.enhydra.jxpdl.elements.ExtendedAttribute) it.next();
                result.put(ea.getName(), ea.getVValue());

            }
        }

        return result;
    }

    public static String getEAValue(WMSessionHandle shandle, String eaName, String procDefId, String procId, String actId, String defaultValue) {
        try {
            String cval = null;

            AdminMisc am = SharkInterfaceWrapper.getShark().getAdminMisc();

            String pkgId = null;
            String pkgVer = null;
            if (null != actId && !actId.equals("")) {
                WMEntity actInfo = am.getActivityDefinitionInfo(shandle, procId, actId);
                pkgId = actInfo.getPkgId();
                pkgVer = actInfo.getPkgVer();
                cval = WMEntityUtilities.findEAAndGetValue(shandle, SharkInterfaceWrapper.getShark().getXPDLBrowser(), actInfo, eaName);
            }
            if (cval == null || cval.trim().equals("")) {
                WMEntity procInfo = null;
                if (procId != null) {
                    procInfo = am.getProcessDefinitionInfo(shandle, procId);
                } else {
                    procInfo = am.getProcessDefinitionInfoByUniqueProcessDefinitionName(shandle, procDefId);
                }
                pkgId = procInfo.getPkgId();
                pkgVer = procInfo.getPkgVer();
                cval = WMEntityUtilities.findEAAndGetValue(shandle, SharkInterfaceWrapper.getShark().getXPDLBrowser(), procInfo, eaName);

            }
            if (cval == null || cval.trim().equals("")) {
                WMEntity pkgInfo = SharkInterfaceWrapper.getShark().getPackageAdministration().getPackageEntity(shandle, pkgId, pkgVer);
                cval = WMEntityUtilities.findEAAndGetValue(shandle, SharkInterfaceWrapper.getShark().getXPDLBrowser(), pkgInfo, eaName);
            }
            if (cval != null && !cval.trim().equals("")) {
                return cval;
            }
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
        return defaultValue;
    }
//
//    static class DataField {
//
//        final public String id;
//        final public String name;
//
//        public DataField(String id, String name) {
//            this.id = id;
//            this.name = name;
//        }
//
//    }
}
