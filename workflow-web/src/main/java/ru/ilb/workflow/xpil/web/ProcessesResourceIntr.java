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
package ru.ilb.workflow.xpil.web;

import ru.ilb.workflow.session.AuthorizationHandler;
import at.together._2006.xpil1.ActivityInstance;
import at.together._2006.xpil1.WorkflowProcessInstance;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.util.Arrays;
import java.util.List;
import java.util.Properties;
import javax.annotation.Resource;
import javax.naming.NamingException;
import javax.sql.DataSource;
import javax.ws.rs.WebApplicationException;
import javax.ws.rs.core.UriBuilder;
import javax.ws.rs.core.UriInfo;
import org.apache.cxf.jaxrs.ext.search.SearchBean;
import org.apache.cxf.jaxrs.ext.search.SearchCondition;
import org.apache.cxf.jaxrs.ext.search.SearchContext;
import org.enhydra.shark.api.client.wfmc.wapi.WMFilter;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.client.wfservice.WMEntity;
import org.enhydra.shark.api.client.xpil.XPILHandler;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import org.enhydra.shark.utilities.namevalue.NameValueUtilities;
import org.enhydra.shark.utilities.wmentity.WMEntityUtilities;
import org.enhydra.shark.xpil.XPILExtendedWorkflowFacilityInstanceDocument;
import org.slf4j.LoggerFactory;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Component;
import org.springframework.transaction.annotation.Transactional;
import org.wfmc._2002.xpdl1.ExtendedAttribute;
import ru.ilb.workflow.search.ProcessFilterVisitor;
import ru.ilb.workflow.toolagent.ProcessToolAgent;
import ru.ilb.workflow.xpil.utils.XPILJAXBUtils;

/**
 *
 * @author slavb
 */
@Component
class ProcessesResourceIntr {

    private static final org.slf4j.Logger logger = LoggerFactory.getLogger(ProcessesResourceIntr.class);

    private SearchContext searchContext;

    public void setSearchContext(SearchContext searchContext) {
        this.searchContext = searchContext;
    }

    @Resource(mappedName = "jdbc/sharkdb")
    private DataSource ds;
    private JdbcTemplate db;

    @Resource(mappedName = "jdbc/sharkdb")
    public void setJT(DataSource datasource) {
        db = new JdbcTemplate(datasource);
    }

    void changePriorityByMK(String campaignUid, Integer priority) {
        String sql1 = "UPDATE SHKProcesses p "
                + "JOIN SHKProcessStates ps ON ps.oid=p.State "
                + "JOIN SHKProcessData sp ON sp.process = p.oid AND sp.variableDefinitionId = 'campaignUid' "
                + "JOIN SHKProcessDefinitions pdef ON pdef.oid=p.ProcessDefinition "
                + "SET p.Priority=CASE "
                + "WHEN sp.VariableValueVCHAR = ? THEN ? "
                + " END "
                + "WHERE "
                + "ps.Name LIKE 'open%' "
                + "AND pdef.ProcessDefinitionId='outgoingcall' "
                + "AND sp.VariableValueVCHAR = ?";
        String sql2 = "UPDATE SHKActivities a "
                + "JOIN SHKProcesses p ON a.Process=p.oid "
                + "JOIN SHKProcessData ca ON ca.process = p.oid AND ca.variableDefinitionId = 'callAction' "
                + "JOIN SHKProcessData sp ON sp.process = p.oid AND sp.variableDefinitionId = 'sessionPriority' "
                + "JOIN SHKProcessStates ps ON ps.oid=p.State "
                + "JOIN SHKActivityStates ast ON ast.oid=a.STATE "
                + "JOIN SHKProcessDefinitions pdef ON pdef.oid=p.ProcessDefinition "
                + "SET a.Priority=(p.priority * 2 + sp.VariableValueLONG) "
                + "WHERE "
                + " (ps.Name LIKE 'open%' ) "
                + "AND (ast.Name LIKE 'open%' ) "
                + "AND pdef.ProcessDefinitionId='outgoingcall' "
                + "AND a.ActivityDefinitionId='outgoingcall_session' "
                + " AND a.priority != (p.priority * 2 + sp.VariableValueLONG)";
        int count1 = db.update(sql1, campaignUid, priority, campaignUid);
        int count2 = db.update(sql2);
        logger.info(">>Было обновлено {} процессов(SHKProcesses) и {} активностей (SHKActivities)", count1, count2);
        /*PreparedStatement pstmt1;
        PreparedStatement pstmt2;
        try(Connection con = ds.getConnection()){
            pstmt1 = con.prepareStatement(
            "UPDATE SHKProcesses p " +
                "JOIN SHKProcessStates ps ON ps.oid=p.State " +
                "JOIN SHKProcessData sp ON sp.process = p.oid AND sp.variableDefinitionId = 'campaignUid' " +
                "JOIN SHKProcessDefinitions pdef ON pdef.oid=p.ProcessDefinition " +
                "SET p.Priority=CASE " +
                "WHEN sp.VariableValueVCHAR = '"+campaignUid+"' THEN " + priority +
                " END " +
                "WHERE " +
                "ps.Name LIKE 'open%' " +
                "AND pdef.ProcessDefinitionId='outgoingcall' " +
                "AND sp.VariableValueVCHAR = '"+campaignUid+"'"
            );
            pstmt1.executeUpdate();
            pstmt1.close();
        }catch(Exception e){
            throw new WebApplicationException("Запрос в БД workflow, для смены приоритета у процессов, завершился не удачно: "
                    + "МК="+campaignUid+",priority="+priority+",error="+e.getMessage(),451);
        }
        try(Connection con = ds.getConnection()){
            pstmt2 = con.prepareStatement(
            "UPDATE SHKActivities a " +
                "JOIN SHKProcesses p ON a.Process=p.oid " +
                "JOIN SHKProcessData ca ON ca.process = p.oid AND ca.variableDefinitionId = 'callAction' " +
                "JOIN SHKProcessData sp ON sp.process = p.oid AND sp.variableDefinitionId = 'sessionPriority' " +
                "JOIN SHKProcessStates ps ON ps.oid=p.State " +
                "JOIN SHKActivityStates ast ON ast.oid=a.STATE " +
                "JOIN SHKProcessDefinitions pdef ON pdef.oid=p.ProcessDefinition " +
                "SET a.Priority=(p.priority * 2 + sp.VariableValueLONG) " +
                "WHERE " +
                " (ps.Name LIKE 'open%' ) " +
                "AND (ast.Name LIKE 'open%' ) " +
                "AND pdef.ProcessDefinitionId='outgoingcall' " +
                "AND a.ActivityDefinitionId='outgoingcall_session' " +
                " AND a.priority != (p.priority * 2 + sp.VariableValueLONG)"
            );
            pstmt2.executeUpdate();
            pstmt2.close();
        }catch(Exception e){
            throw new WebApplicationException("Запрос в БД workflow, для смены приоритета у процессов, завершился не удачно: "
                    + "МК="+campaignUid+",priority="+priority+",error="+e.getMessage(),451);
        }*/
    }

    @Transactional
    void checkDeadlinesWithFiltering(String filter) {
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            WMFilter f = getProcessFilter(shandle, filter);
            SharkInterfaceWrapper.getShark().getExecutionAdministration().checkDeadlinesWithFiltering(shandle, f);
            SharkInterfaceWrapper.getShark().getExecutionAdministration().reevaluateDeadlinesWithFiltering(shandle, f);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }

    }

    WMFilter getProcessFilter(WMSessionHandle shandle, String filter) {
        WMFilter f = null;
        if (filter != null) {
            SearchCondition<SearchBean> sc = searchContext.getCondition(filter, SearchBean.class);
            ProcessFilterVisitor<SearchBean> visitor = new ProcessFilterVisitor<>(shandle);
            sc.accept(visitor);
            f = visitor.getQuery();
        }
        return f;
    }

    @Transactional
    WMSessionHandle getSessionHandle(String username, Object vendorSpecificData) throws Exception {
        return SharkInterfaceWrapper.getSessionHandle(username, vendorSpecificData);
    }

    @Transactional
    void reevaluateDeadlinesForProcesses(WMSessionHandle shandle, String processId) throws Exception {
        try {
            SharkInterfaceWrapper.getShark().getExecutionAdministration().reevaluateDeadlinesForProcesses(shandle, new String[]{processId});
        } catch (Exception ex) {
            if (!ex.getMessage().contains("closed")) {
                throw ex;
            }
        }
    }

    @Transactional
    void reevaluateAssignmentsForProcesses(WMSessionHandle shandle, String processId) throws Exception {
        try {
            SharkInterfaceWrapper.getShark().getExecutionAdministration().reevaluateAssignmentsForProcesses(shandle, new String[]{processId}, true);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Transactional
    void startActivity(WMSessionHandle shandle, String processId, String activityId) throws Exception {
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

    public UriBuilder getUriBuilder(ActivityInstance activity, WorkflowProcessInstance process, UriInfo uriInfo) {
        UriBuilder uriBuilder;
        // disable WORKFLOW_FORM_RESOURCE_URL: IllegalArgumentException: Unresolved variables; only 0 value(s) given for 2 unique variable(s)
        String resourceUrl = null; //getResourceUrl(activity, process);
        if (resourceUrl != null) {
            uriBuilder = UriBuilder.fromPath(resourceUrl);
        } else {
            uriBuilder = uriInfo.getBaseUriBuilder();
        }
        return uriBuilder;
    }

    private String getResourceUrl(ActivityInstance activity, WorkflowProcessInstance process) {
        String resourceUrl = null;
        String urlOwner = "";
        if (activity != null && activity.getActivity() != null && activity.getActivity().getExtendedAttributes() != null) {
            ExtendedAttribute ea = ProcessToolAgent.getFirstExtendedAttributeByName("WORKFLOW_FORM_RESOURCE_URL", activity.getActivity().getExtendedAttributes().getExtendedAttributes());
            if (ea != null) {
                resourceUrl = ea.getValue();
                urlOwner = "for activity " + activity.getId();
            }
        }
        if (resourceUrl == null && process != null && process.getWorkflowProcess() != null && process.getWorkflowProcess().getExtendedAttributes() != null) {
            ExtendedAttribute ea = ProcessToolAgent.getFirstExtendedAttributeByName("WORKFLOW_FORM_RESOURCE_URL", process.getWorkflowProcess().getExtendedAttributes().getExtendedAttributes());
            if (ea != null) {
                resourceUrl = ea.getValue();
                urlOwner = "for process " + process.getId();
            }
        }
        if (resourceUrl != null && resourceUrl.startsWith("${") && resourceUrl.endsWith("}")) {
            try {
                resourceUrl = resourceUrl.substring(2, resourceUrl.length() - 1);
                resourceUrl = (String) new javax.naming.InitialContext().lookup(resourceUrl);
            } catch (NamingException ex) {
                logger.error("Unknown resource url ({}) {} ", resourceUrl, urlOwner);
            }
        }
        return resourceUrl;
    }

    public WorkflowProcessInstance getProcessFromResource(String processId, String activityId) throws Exception {
        WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
        Properties props = new Properties();
        props.setProperty(XPILHandler.FILL_PROCESS_EXT_ATTRIBS, "true");
        props.setProperty(XPILHandler.FILL_ACTIVITY_EXT_ATTRIBS, "true");
        String res = SharkInterfaceWrapper.getShark().getXPILHandler()
                .getActivityDetails(shandle, processId, activityId, NameValueUtilities.convertPropertiesToNameValueArray(props));
        XPILExtendedWorkflowFacilityInstanceDocument tws = XPILExtendedWorkflowFacilityInstanceDocument.Factory.parse(res);
        res = tws.xmlText();
        WorkflowProcessInstance process = XPILJAXBUtils.fromStringWfProcess(res);
        return process;
    }

    public ActivityInstance getActivityFromProcess(WorkflowProcessInstance process, String activityId) {
        if (activityId != null && process != null) {
            for (ActivityInstance ai : process.getActivityInstances().getManualActivityInstancesAndToolActivityInstancesAndBlockActivityInstances()) {
                if (activityId.equals(ai.getId())) {
                    return ai;
                }
            }
        }
        return null;
    }

}
