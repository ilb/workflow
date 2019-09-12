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
import at.together._2006.xpil1.DataInstance;
import at.together._2006.xpil1.DataInstances;
import at.together._2006.xpil1.ExtendedWorkflowFacilityInstance;
import at.together._2006.xpil1.ManualActivityInstance;
import at.together._2006.xpil1.StringArrayDataInstance;
import at.together._2006.xpil1.StringValue;
import at.together._2006.xpil1.WorkflowProcessInstance;
import at.together._2006.xpil1.WorkflowProcessInstances;
import com.google.common.util.concurrent.Striped;
import java.net.URI;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.text.SimpleDateFormat;
import java.time.LocalDateTime;
import java.time.ZoneId;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Date;
import java.util.HashMap;
import java.util.Iterator;
import java.util.List;
import java.util.Map;
import java.util.Objects;
import java.util.Properties;
import java.util.UUID;
import java.util.concurrent.Callable;
import java.util.concurrent.locks.ReadWriteLock;
import javax.annotation.Resource;
import javax.servlet.http.HttpServletRequest;
import javax.sql.DataSource;
import javax.ws.rs.Path;
import javax.ws.rs.WebApplicationException;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.HttpHeaders;
import javax.ws.rs.core.MultivaluedMap;
import javax.ws.rs.core.Response;
import javax.ws.rs.core.UriInfo;
import javax.xml.namespace.QName;
import org.apache.cxf.jaxrs.ext.MessageContext;
import org.apache.cxf.jaxrs.ext.search.SearchBean;
import org.apache.cxf.jaxrs.ext.search.SearchCondition;
import org.apache.cxf.jaxrs.ext.search.SearchContext;
import org.apache.cxf.jaxrs.ext.xml.XSLTTransform;
import org.enhydra.shark.api.client.wfmc.wapi.WAPI;
import org.enhydra.shark.api.client.wfmc.wapi.WMActivityInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMActivityInstanceState;
import org.enhydra.shark.api.client.wfmc.wapi.WMAttribute;
import org.enhydra.shark.api.client.wfmc.wapi.WMFilter;
import org.enhydra.shark.api.client.wfmc.wapi.WMProcessDefinition;
import org.enhydra.shark.api.client.wfmc.wapi.WMProcessInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.client.wfmc.wapi.WMWorkItem;
import org.enhydra.shark.api.client.wfmc.wapi.WMWorkItemState;
import org.enhydra.shark.api.client.wfservice.AdminMisc;
import org.enhydra.shark.api.client.wfservice.ExecutionAdministration;
import org.enhydra.shark.api.client.wfservice.PackageAdministration;
import org.enhydra.shark.api.client.wfservice.WMEntity;
import org.enhydra.shark.api.client.wfservice.XPDLBrowser;
import org.enhydra.shark.api.client.xpil.XPILHandler;
import org.enhydra.shark.api.common.ActivityFilterBuilder;
import org.enhydra.shark.api.common.AssignmentFilterBuilder;
import org.enhydra.shark.api.common.SharkConstants;
import org.enhydra.shark.api.internal.toolagent.ToolAgentGeneralException;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import org.enhydra.shark.utilities.misc.MiscUtilities;
import org.enhydra.shark.utilities.namevalue.NameValueUtilities;
import org.enhydra.shark.utilities.wmentity.WMEntityUtilities;
import org.enhydra.shark.webclient.business.prof.graph.SnapshotImageCreator;
import org.enhydra.shark.xpil.XPILAssignmentInstanceDocument;
import org.enhydra.shark.xpil.XPILExecutionInstance;
import org.enhydra.shark.xpil.XPILExtendedWorkflowFacilityInstanceDocument;
import org.enhydra.shark.xpil.XPILManualActivityInstanceDocument;
import org.enhydra.shark.xpil.XPILWorkflowProcessInstance;
import org.enhydra.shark.xpil.XPILWorkflowProcessInstancesDocument;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.support.rowset.SqlRowSet;
import org.springframework.stereotype.Component;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.collection.api.CollectcasesResource;
import ru.ilb.common.jaxrs.async.AsyncTaskManager;
import ru.ilb.workflow.xpil.api.ProcessesResource;
import ru.ilb.workflow.search.ActivityFilterVisitor;
import ru.ilb.workflow.utils.ContentDisposition;
import ru.ilb.workflow.utils.ExceptionUtils;
import ru.ilb.workflow.utils.WAPIUtils;
import ru.ilb.workflow.xpil.utils.XPILJAXBUtils;
import ru.ilb.workflow.xpil.utils.XPILJAXBWrapper;
import ru.ilb.workflow.xpil.utils.XPILUtils;
import ru.ilb.workflow.xpil.utils.XpilpropUtils;

@Path("processes")
@Component
public class ProcessesResourceImpl implements ProcessesResource {

    private static final org.slf4j.Logger logger = LoggerFactory.getLogger(ProcessesResourceImpl.class);
    @Autowired
    UsersResourceImpl userResourceImpl;
    @Autowired
    ProcessesResourceIntr processesResourceIntr;
    @Autowired
    AsyncTaskManager asyncTaskManager;

    private UriInfo uriInfo;
    private HttpServletRequest httpServletRequest;
    private HttpHeaders headers;
    //WMSessionHandle shandle;
    private MessageContext messageContext;

    private SearchContext searchContext;

    private Map<String, Integer> activityStates;

    private JdbcTemplate db;

    @Resource(mappedName = "jdbc/sharkdb")
    public void setJT(DataSource datasource) {
        db = new JdbcTemplate(datasource);
    }

    @Resource(name = "collectionProxy")
    private CollectcasesResource collectionProxy;

    @Resource(mappedName = "xpdlRepository")
    private String xpdlRepository;

    private Striped<ReadWriteLock> processLock = Striped.lazyWeakReadWriteLock(50);

    @Context
    public void setUriInfo(UriInfo uriInfo) {
        this.uriInfo = uriInfo;
    }

    @Context
    public void setHttpServletRequest(HttpServletRequest httpServletRequest) {
        this.httpServletRequest = httpServletRequest;
    }

    @Context
    public void setHeaders(HttpHeaders headers) {
        this.headers = headers;
    }

    @Context
    public void setSearchContext(SearchContext searchContext) {
        this.searchContext = searchContext;
    }

    @Context
    public void setJaxrsContext(MessageContext jaxrsContext) {
        this.messageContext = jaxrsContext;
    }

    @XSLTTransform(value = "stylesheets/workflow/workList.xsl", mediaTypes = "application/xhtml+xml", type = XSLTTransform.TransformType.SERVER)
    @Transactional
    @Override
    public WorkflowProcessInstances getWorkList(String x_remote_user, List<String> xpilprop, String filter) {
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            Properties props = new Properties();
            props.setProperty(XPILHandler.FILL_USERS, "false");
            props.setProperty(XPILHandler.FILL_PROCESS_EXT_ATTRIBS, "true");
            props.setProperty(XPILHandler.FILL_ACTIVITY_EXT_ATTRIBS, "true");
            XpilpropUtils.convertXpilpropListToProperties(xpilprop, props);

            String res = SharkInterfaceWrapper.getShark().getXPILHandler()
                    .getWorklist(shandle, getWorkListFilter(shandle, filter),
                            NameValueUtilities.convertPropertiesToNameValueArray(props));
            WorkflowProcessInstances result = XPILJAXBUtils.fromStringWfProcesses(res);
            for (WorkflowProcessInstance proc : result.getMainWorkflowProcessInstancesAndSubWorkflowProcessInstances()) {
                if (proc.getActivityInstances() != null) {
                    for (ActivityInstance act : proc.getActivityInstances().getManualActivityInstancesAndToolActivityInstancesAndBlockActivityInstances()) {
                        URI uri = processesResourceIntr.getUriBuilder(act, proc, uriInfo).path("processes").path(proc.getId()).path("activities").path(act.getId()).build();
                        act.getOtherAttributes().put(new QName("http://www.w3.org/1999/xlink", "href", "xlink"), uri.toString());
                    }
                }
            }
            return result;
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }

    }

    private WMFilter getWorkListFilter(WMSessionHandle shandle, String filter) throws Exception {
        if ("plain".equals(filter)) {
            filter = "";
            MultivaluedMap<String, String> params = uriInfo.getQueryParameters();
            for (Map.Entry<String, List<String>> e : params.entrySet()) {
                if (!"filter".equals(e.getKey())) {
                    for (String value : e.getValue()) {
                        if (!value.isEmpty()) {
                            if (!filter.isEmpty()) {
                                filter = filter + ";";
                            }
                            filter = filter + e.getKey() + "==" + value;
                        }
                    }
                }
            }
        }
        ActivityFilterBuilder afb = SharkInterfaceWrapper.getShark().getActivityFilterBuilder();
        WMFilter f;
        if (filter != null && !filter.isEmpty()) {
            SearchCondition<SearchBean> sc = searchContext.getCondition(filter, SearchBean.class);
            ActivityFilterVisitor<SearchBean> visitor = new ActivityFilterVisitor<>(shandle, AuthorizationHandler.getAuthorisedUser());
            sc.accept(visitor);
            f = visitor.getQuery();
        } else {
            f = afb.createEmptyFilter(shandle);
        }

        return f;
    }

    @Override
    @Transactional
    public void postWorkList(String filter, String state) {
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            WMActivityInstance[] acts = wapi.listActivityInstances(shandle, getWorkListFilter(shandle, filter), false).getArray();
            for (WMActivityInstance act : acts) {
                WAPIUtils.changeActivityState(shandle, act, state);
            }
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

//    private void updateVariables(WMSessionHandle shandle, String processId, String activityId, MultivaluedMap map) throws Exception {
//        if (map != null && map.size() > 0) {
//            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
//            Iterator<String> it = map.keySet().iterator();
//
//            while (it.hasNext()) {
//                String theKey = (String) it.next();
//                if (theKey.startsWith("DataInstances.")) {
//                    String varName = theKey.substring(14);
//                    String varValue = (String) map.getFirst(theKey);
//                    WMAttribute attr = wapi.getProcessInstanceAttributeValue(shandle, processId, varName);
//                    Object value = WAPIUtils.StringToWMAttributeVal(attr, varValue);
//                    if (activityId == null) {
//                        wapi.assignProcessInstanceAttribute(shandle, processId, varName, value);
//                    } else {
//                        wapi.assignActivityInstanceAttribute(shandle, processId, activityId, varName, value);
//                    }
//                }
//            }
//        }
//    }
    @Override
    @XSLTTransform(value = "stylesheets/workflow/process.xsl", mediaTypes = "application/xhtml+xml", type = XSLTTransform.TransformType.SERVER)
    @Transactional
    public WorkflowProcessInstance getProcess(String processId, List<String> xpilprop) {
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            String res = SharkInterfaceWrapper.getShark()
                    .getXPILHandler()
                    .getProcessDetails(shandle, processId, XpilpropUtils.convertXpilpropListToNameValueArray(xpilprop));
            WorkflowProcessInstance process = XPILJAXBUtils.fromStringWfProcess(res);
            //process.getOtherAttributes().put(new QName("http://www.w3.org/1999/xlink", "href", "xlink"), "http://www.myEbooksStore.com/books/0120");
            return process;
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    @XSLTTransform(value = "stylesheets/workflow/history.xsl", mediaTypes = "application/xhtml+xml", type = XSLTTransform.TransformType.SERVER)
    @Transactional
    public ExtendedWorkflowFacilityInstance getProcessHistory(String processId) {
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            WMFilter f = null;
            String res = SharkInterfaceWrapper.getShark()
                    .getXPILHandler()
                    .getProcessHistory(shandle, f, processId, null/*XpilpropUtils.convertXpilpropListToNameValueArray(xpilprop)*/);
            ExtendedWorkflowFacilityInstance process = XPILJAXBUtils.fromString(res);
            //process.getOtherAttributes().put(new QName("http://www.w3.org/1999/xlink", "href", "xlink"), "http://www.myEbooksStore.com/books/0120");
            return process;
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    @Transactional
    public Response getProcessGraph(String processId) {
        byte[] b = null;
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            b = SnapshotImageCreator.getGraph(shandle, processId, null);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
        return Response.ok(b).build();
    }

    @Transactional
    @XSLTTransform(value = "stylesheets/workflow/processList.xsl", mediaTypes = {"application/xhtml+xml", "text/csv"}, type = XSLTTransform.TransformType.SERVER)
    @Override
    public WorkflowProcessInstances getProcessInstanceList(List<String> xpilprop, String filter) {
        try {
            WorkflowProcessInstances result = new WorkflowProcessInstances();
            if (filter != null) {
                WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
                Properties props = new Properties();
                props.setProperty(XPILHandler.FILL_USERS, "false");
                XpilpropUtils.convertXpilpropListToProperties(xpilprop, props);
                processesResourceIntr.setSearchContext(searchContext);
                WMFilter f = processesResourceIntr.getProcessFilter(shandle, constructPlainProcessFilter(filter));

                String res = SharkInterfaceWrapper.getShark()
                        .getXPILHandler()
                        .getProcessInstanceList(shandle, AuthorizationHandler.getAuthorisedUser(), f, NameValueUtilities.convertPropertiesToNameValueArray(props));
                result = XPILJAXBUtils.fromStringWfProcesses(res);
            }
            if (messageContext.getHttpHeaders().getAcceptableMediaTypes().get(0).toString().equals("text/csv")) {
                messageContext.getHttpServletResponse().addHeader("Content-Disposition", ContentDisposition.getContentDispositionHeader(ContentDisposition.DISPOSITION_ATTACHMENT, "process.csv", "UTF-8"));
                messageContext.put("xslt.template", "stylesheets/workflow/processCsv.xsl");
            }
            return result;
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    private String constructPlainProcessFilter(String filter) {
        if ("plain".equals(filter)) {
            filter = "";
            MultivaluedMap<String, String> params = uriInfo.getQueryParameters();
            for (Map.Entry<String, List<String>> e : params.entrySet()) {
                if (!"filter".equals(e.getKey())) {
                    for (String value : e.getValue()) {
                        if (!value.isEmpty()) {
                            if (!filter.isEmpty()) {
                                filter = filter + ";";
                            }
                            filter = filter + e.getKey() + "==" + value;
                        }
                    }
                }
            }
        }
        return filter;
    }

    @Transactional
    @Override
    public String terminateProcessInstanceList(String filter) {
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            if (filter == null) {
                throw new WebApplicationException("filter required for delete", Response.Status.BAD_REQUEST);
            }
            WorkflowProcessInstances list = getProcessInstanceList(null, filter);
            int count = 0;
            for (WorkflowProcessInstance proc : list.getMainWorkflowProcessInstancesAndSubWorkflowProcessInstances()) {
                wapi.terminateProcessInstance(shandle, proc.getId());
                count++;
            }
            return Integer.toString(count);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }

    }

    @Transactional
    @Override
    public String deleteProcessInstanceList(String filter) {
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            ExecutionAdministration ex = SharkInterfaceWrapper.getShark().getExecutionAdministration();
            if (filter == null) {
                throw new WebApplicationException("filter required for delete", Response.Status.BAD_REQUEST);
            }
            processesResourceIntr.setSearchContext(searchContext);
            WMFilter procFilter = processesResourceIntr.getProcessFilter(shandle, filter);
            ex.deleteProcessesWithFiltering(shandle, procFilter);
            return "OK";
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    @Transactional
    public String createProcessInstance(Boolean redirect, String x_remote_user, WorkflowProcessInstance mainworkflowprocessinstance) {
        try {
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            //WMSessionHandle shandle = SharkInterfaceWrapper.makeWAPIConnection(wapi, AuthorizationHandler.getAuthorisedUser(), null);
            String procDefId;
            XPDLBrowser xpdlb = SharkInterfaceWrapper.getShark().getXPDLBrowser();
            if (mainworkflowprocessinstance.getFactoryId() != null) {
                String[] parts = mainworkflowprocessinstance.getFactoryId().split("#");
                procDefId = xpdlb.getUniqueProcessDefinitionName(shandle, parts[0], parts[1], parts[2]);
            } else if (mainworkflowprocessinstance.getDefinitionId() != null && mainworkflowprocessinstance.getPackageId() != null) {
                procDefId = xpdlb.getUniqueProcessDefinitionName(shandle, mainworkflowprocessinstance.getPackageId(), "", mainworkflowprocessinstance.getDefinitionId());
            } else {
                throw new WebApplicationException("@FactoryId or @PackageId and @DefinitionId should be specified for create", 400);
            }

            String processId = wapi.createProcessInstance(shandle, procDefId, null);
            XPILJAXBWrapper.editProcess(shandle, mainworkflowprocessinstance, processId);
            wapi.startProcess(shandle, processId);

            if (Boolean.TRUE.equals(redirect)) {
                List<String> xpilprop = new ArrayList<>();
                xpilprop.add("FILL_PROCESS_EXT_ATTRIBS");
                WorkflowProcessInstance process = getProcess(processId, xpilprop);
                WMActivityInstance nextAct = WAPIUtils.findNextActivity(shandle, AuthorizationHandler.getAuthorisedUser(), processId);
                if (nextAct != null) {
                    URI uri = processesResourceIntr.getUriBuilder(null, process, uriInfo).path("processes").path(processId).path("activities").path(nextAct.getId()).build();
//                messageContext.getHttpServletResponse().sendRedirect(uri.toString());
                    messageContext.getHttpServletResponse().addHeader("Location", uri.toString());
                }
            }
            return processId;

        } catch (ToolAgentGeneralException ex) {
            throw ExceptionUtils.exceptionConverter(ex);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Transactional
    @Override
    public WorkflowProcessInstance createProcessInstanceXml(List<String> xpilprop, Boolean redirect, String x_remote_user, WorkflowProcessInstance mainworkflowprocessinstance) {
        String processId = createProcessInstance(redirect, x_remote_user, mainworkflowprocessinstance);
        try {
            xpilprop.add("FILL_PROCESS_EXT_ATTRIBS");
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            String res = SharkInterfaceWrapper.getShark()
                    .getXPILHandler()
                    .getProcessDetails(shandle, processId, XpilpropUtils.convertXpilpropListToNameValueArray(xpilprop));
            WorkflowProcessInstance process = XPILJAXBUtils.fromStringWfProcess(res);
            return process;
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Transactional
    @Override
    public void terminateProcessInstance(String processId) {
        try {
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            wapi.terminateProcessInstance(shandle, processId);
        } catch (Exception ex) {
            if (!ex.getMessage().contains("closed")) {
                throw new RuntimeException(ex);
            }
        }
    }

    /*
     @Transactional
     @Override
     public Response editProcessInstance(String processId, List<String> xpilprop, MultivaluedMap map) {
     try {
     WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
     updateVariables(shandle, processId, null, map);
     SharkInterfaceWrapper.getShark().getExecutionAdministration().reevaluateDeadlinesForProcesses(shandle, new String[]{processId});
     //URI uri = uriInfo.getBaseUriBuilder().path(ProcessResource.class).path(processId).build();
     //return Response.seeOther(uri).build();
     return Response.noContent().build();
     } catch (Exception ex) {
     throw new RuntimeException(ex);
     }
     }
     */
    @Transactional
    @Override
    public void editProcess(String processId, WorkflowProcessInstance mainworkflowprocessinstance) {
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            XPILJAXBWrapper.editProcess(shandle, mainworkflowprocessinstance, processId);
            try {
                SharkInterfaceWrapper.getShark().getExecutionAdministration().reevaluateDeadlinesForProcesses(shandle, new String[]{processId});
            } catch (Exception ex) {
                if (!ex.getMessage().contains("closed")) {
                    throw new RuntimeException(ex);
                }
            }
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Transactional
    @XSLTTransform(value = "stylesheets/workflow/activity.xsl", mediaTypes = "application/xhtml+xml", type = XSLTTransform.TransformType.SERVER)
    @Override
    public WorkflowProcessInstance getActivity(String processId, String activityId, List<String> xpilprop, Boolean accept) {
        try {
            String userName = AuthorizationHandler.getAuthorisedUser();
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(userName, null);
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            //WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);;
            Properties props = new Properties();
            props.setProperty(XPILHandler.FILL_ACTIVITY_VARIABLES, "true");
            props.setProperty(XPILHandler.FILL_ACTIVITY_EXT_ATTRIBS, "true");
            props.setProperty(XPILHandler.FILL_PROCESS_EXT_ATTRIBS, "true");
            props.setProperty(XPILHandler.FILL_VARIABLE_EXT_ATTRIBS, "true");
            props.setProperty(XPILHandler.FILL_VARIABLE_XPDL_DATA, "true");
            XpilpropUtils.convertXpilpropListToProperties(xpilprop, props);
            WMActivityInstance act = getActivityByActivityOrDefinitionId(shandle, processId, activityId);
            if (act == null) {
                throw new WebApplicationException("Этап не найден", 404);
            }
            WMProcessInstance proc = wapi.getProcessInstance(shandle, processId);
            String res = SharkInterfaceWrapper.getShark().getXPILHandler()
                    .getActivityDetails(shandle, act.getProcessInstanceId(), act.getId(), NameValueUtilities.convertPropertiesToNameValueArray(props));

            XPILExtendedWorkflowFacilityInstanceDocument tws = XPILExtendedWorkflowFacilityInstanceDocument.Factory.parse(res);
            XPILWorkflowProcessInstancesDocument.WorkflowProcessInstances workflowProcessInstances = tws.getExtendedWorkflowFacilityInstance().getPackageInstanceArray(0).getWorkflowProcessFactoryInstances().getWorkflowProcessFactoryInstanceArray(0).getWorkflowProcessInstances();
            XPILWorkflowProcessInstance ins = null;
            if (workflowProcessInstances.getMainWorkflowProcessInstanceArray().length > 0) {
                ins = workflowProcessInstances.getMainWorkflowProcessInstanceArray(0);
            } else if (workflowProcessInstances.getSubWorkflowProcessInstanceArray().length > 0) {
                ins = workflowProcessInstances.getSubWorkflowProcessInstanceArray(0);
            }
            if (ins == null) {
                throw new WebApplicationException("Не найден процесс");
            }
            AdminMisc am = SharkInterfaceWrapper.getShark().getAdminMisc();
            XPILManualActivityInstanceDocument.ManualActivityInstance[] maiList = ins.getActivityInstances().getManualActivityInstanceArray();
            if (maiList.length > 0) {

                XPILManualActivityInstanceDocument.ManualActivityInstance mai = maiList[0];

                WMEntity actEnt = am.getActivityDefinitionInfo(shandle, ins.getId(), mai.getId());

                String[][] extAttribs = WMEntityUtilities.getExtAttribNVPairs(shandle,
                        SharkInterfaceWrapper.getShark().getXPDLBrowser(), actEnt);
                //автоблокировка
                boolean filterVariables = false;

                for (String[] extAttrib : extAttribs) {
                    String eaName = extAttrib[0];
                    String eaValue = extAttrib[1];
                    if (eaName.startsWith("VariableToProcess_")) {
                        filterVariables = true;
                    }
                    if (mai.getState().equals(XPILExecutionInstance.State.OPEN_NOT_RUNNING_NOT_STARTED)) {
                        if (Boolean.TRUE.equals(accept) && mai.getAssignmentInstances() != null) {
                            for (XPILAssignmentInstanceDocument.AssignmentInstance ai : mai.getAssignmentInstances().getAssignmentInstanceArray()) {
                                if (userName.equals(ai.getUsername())) {
                                    wapi.changeActivityInstanceState(shandle, processId, activityId, WMActivityInstanceState.valueOf(SharkConstants.STATE_OPEN_RUNNING));
                                    SharkInterfaceWrapper.getShark().getExecutionAdministration().reevaluateDeadlinesForProcesses(shandle, new String[]{processId});
                                    return getActivity(processId, activityId, xpilprop, false);
                                }
                            }
                        }
                        if ("CHECK_FOR_COMPLETION".equals(eaName) && "true".equals(eaValue)) {
                            wapi.changeActivityInstanceState(shandle, processId, activityId, WMActivityInstanceState.valueOf(SharkConstants.STATE_OPEN_RUNNING));
                            wapi.changeActivityInstanceState(shandle, processId, activityId, WMActivityInstanceState.valueOf(SharkConstants.STATE_CLOSED_COMPLETED));
                            WMActivityInstance nextAct = WAPIUtils.findNextActivity(shandle, AuthorizationHandler.getAuthorisedUser(), processId);
                            if (nextAct != null) {
                                URI uri = uriInfo.getBaseUriBuilder().path("processes").path(processId).path("activities").path(nextAct.getId()).build();
                                messageContext.getHttpServletResponse().sendRedirect(uri.toString());
                                //messageContext.getHttpServletResponse().addHeader("Location", uri.toString());
                                return null;
                            }
                        }
                    }
                }
                // фильтрация переменных
                if (filterVariables) {
                    XPILUtils.filterActivityVariables(mai.getDataInstances(), extAttribs, false, false);
                }
            }

            res = tws.xmlText();
            WorkflowProcessInstance process = XPILJAXBUtils.fromStringWfProcess(res);
            String packageId = proc.getProcessFactoryName().substring(0, proc.getProcessFactoryName().indexOf("#"));
            java.nio.file.Path stylesheet = getStylesheet(packageId, proc.getProcessDefinitionId(), act.getActivityDefinitionId());
            if (stylesheet != null) {
                messageContext.put("xslt.template", stylesheet.toString());
            }
            return process;
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    private java.nio.file.Path getStylesheet(String packageId, String procDefId, String actDefIf) {
        java.nio.file.Path stylesheet = Paths.get(xpdlRepository, "packages", packageId, procDefId, "stylesheets", actDefIf + ".xsl");
        if (!Files.exists(stylesheet)) {
            stylesheet = null;
        }
        return stylesheet;
    }

    private WMActivityInstance getActivityByActivityOrDefinitionId(WMSessionHandle shandle, String processId, String activityOrDefinitionId) throws Exception {
        WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
        WMActivityInstance act = null;
        if ("current".equals(activityOrDefinitionId)) {
            act = WAPIUtils.findNextActivity(shandle, AuthorizationHandler.getAuthorisedUser(), processId);
        } else {
            act = wapi.getActivityInstance(shandle, processId, activityOrDefinitionId);
            if (act == null) {
                ActivityFilterBuilder afb = SharkInterfaceWrapper.getShark().getActivityFilterBuilder();
                WMFilter filter = afb.addProcessIdEquals(shandle, processId);
                filter = afb.and(shandle, filter, afb.addDefinitionIdEquals(shandle, activityOrDefinitionId));
                filter = afb.and(shandle, filter, afb.addStateStartsWith(shandle, SharkConstants.STATEPREFIX_OPEN));
                WMActivityInstance[] acts = wapi.listActivityInstances(shandle, filter, false).getArray();
                if (acts.length > 0) {
                    act = acts[0];
                }
            }
        }
        return act;
    }

    @Transactional
    @Override
    public String editActivity(String processId, String activityId, Boolean redirect, ActivityInstance activityinstance
    ) {
        try {
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            WMActivityInstance act = getActivityByActivityOrDefinitionId(shandle, processId, activityId);
            activityId = act.getId();
            if (act == null) {
                throw new WebApplicationException("Этап не найден", 404);
            }
            if (act.getState().isClosed()) {
                throw new WebApplicationException("Этап уже завершен, нельзя выполнить действие", 450);
            }
            /*if ("current".equals(activityId)) {
             act = WAPIUtils.findNextActivity(shandle, AuthorizationHandler.getAuthorisedUser(), processId);
             activityId = act.getId();
             } else {
             act = wapi.getActivityInstance(shandle, processId, activityId);
             }*/
            XPILJAXBWrapper.editActivity(shandle, activityinstance, processId, activityId);
            Boolean stateChanged = WAPIUtils.changeActivityState(shandle, act, activityinstance.getState());
            try {
                SharkInterfaceWrapper.getShark().getExecutionAdministration().reevaluateDeadlinesForProcesses(shandle, new String[]{processId});
            } catch (Exception ex) {
                if (!ex.getMessage().contains("closed")) {
                    throw new RuntimeException(ex);
                }
            }
            if (SharkConstants.STATE_CLOSED_COMPLETED.equals(activityinstance.getState()) && stateChanged && Boolean.TRUE.equals(redirect)) {
                WMActivityInstance nextAct = null;
                try {
                    nextAct = WAPIUtils.findNextActivity(shandle, AuthorizationHandler.getAuthorisedUser(), processId);
                } catch (Exception ex) {
                    logger.error("Exception in findNextActivity,continue without redirect", ex);
                }
                if (nextAct != null) {
                    activityId = nextAct.getId();
                    WorkflowProcessInstance process = processesResourceIntr.getProcessFromResource(nextAct.getProcessInstanceId(), nextAct.getId());
                    ActivityInstance activity = processesResourceIntr.getActivityFromProcess(process, nextAct.getId());
                    URI uri = processesResourceIntr.getUriBuilder(activity, process, uriInfo).path("processes").path(processId).path("activities").path(nextAct.getId()).build();
                    messageContext.getHttpServletResponse().addHeader("Location", uri.toString());
                }
            }
            //wapi.disconnect(shandle);
            return activityId;
        } catch (WebApplicationException ex) {
            throw ex;
        } catch (ToolAgentGeneralException ex) {
            throw ExceptionUtils.exceptionConverter(ex);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }

    }

    @Transactional
    @Override
    public WorkflowProcessInstance editActivityXml(String processId, String activityId, List<String> xpilprop, Boolean redirect, ActivityInstance activityinstance) {
        editActivity(processId, activityId, redirect, activityinstance);
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            String res = SharkInterfaceWrapper.getShark()
                    .getXPILHandler()
                    .getProcessDetails(shandle, processId, XpilpropUtils.convertXpilpropListToNameValueArray(xpilprop));
            WorkflowProcessInstance process = XPILJAXBUtils.fromStringWfProcess(res);
            return process;
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Transactional
    @Override
    @XSLTTransform(value = "stylesheets/workflow/comments.xsl", mediaTypes = "application/xhtml+xml", type = XSLTTransform.TransformType.SERVER)
    public WorkflowProcessInstance getProcessComments(String processId) {
        List<String> xpilprop = new ArrayList<>();
        xpilprop.add("FILL_PROCESS_VARIABLES");

        WorkflowProcessInstance mainworkflowprocessinstance = getProcess(processId, xpilprop);
        for (Iterator<DataInstance> it = mainworkflowprocessinstance.getDataInstances().getStringDataInstancesAndStringArrayDataInstancesAndBooleanDataInstances().iterator(); it.hasNext();) {
            DataInstance sdi = it.next();
            switch (sdi.getId()) {
                case "comments":
                    break;
                default:
                    it.remove();
                    break;
            }
        }
        return mainworkflowprocessinstance;
    }

    @Transactional
    @Override
    public void addProcessComment(String processId, StringValue stringdatainstance) {
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            WMAttribute attr = wapi.getProcessInstanceAttributeValue(shandle, processId, "comments");
            String comment = AuthorizationHandler.getAuthorisedUser() + ";" + new SimpleDateFormat("yyyy-MM-dd'T'HH:mm:ssXXX").format(new Date())
                    + ";" + stringdatainstance.getValue();;

            String[] value = (String[]) attr.getValue();
            if (value == null) {
                value = new String[]{comment};
            } else {
                value = Arrays.copyOf(value, value.length + 1);
                value[value.length - 1] = comment;
            }
            wapi.assignProcessInstanceAttribute(shandle, processId, "comments", value);

            WMProcessInstance proc = wapi.getProcessInstance(shandle, processId);
            WMProcessDefinition pdef = wapi.getProcessDefinition(shandle, proc.getProcessFactoryName());
            if ("collection_activity".equals(pdef.getId())) {
                WMAttribute clientUUIDAttr = wapi.getProcessInstanceAttributeValue(shandle, processId, "clientUUID");
                String clientUUID = clientUUIDAttr.getValue() != null ? ((String[]) clientUUIDAttr.getValue())[0] : null;
                logger.info("setLastActivityCommentDate processId = " + processId + " UID = " + clientUUID);
                collectionProxy.setLastActivityCommentDate(UUID.fromString(clientUUID), (new Date()));
            }
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }

    }

    @Transactional
    @Override
    public String migrateProcess(String processId) {
        String res = "Версия процесса актуальна";
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            WMProcessInstance proc = wapi.getProcessInstance(shandle, processId);
            PackageAdministration pa = SharkInterfaceWrapper.getShark().getPackageAdministration();
            WMProcessDefinition pdef = wapi.getProcessDefinition(shandle, proc.getProcessFactoryName());
            String lastVersion = pa.getCurrentPackageVersion(shandle, pdef.getPackageId());
            if (!lastVersion.equals(pdef.getVersion())) {
                String factoryId = pdef.getPackageId() + "#" + lastVersion + "#" + pdef.getId();
                res = "Процесс " + processId + " мигрирован " + pdef.getVersion() + " -> " + lastVersion;
                SharkInterfaceWrapper.getShark().getExecutionAdministrationExtension().migrateProcessVersion(shandle, factoryId, proc.getId());
            }

        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
        return res;
    }

    @Transactional
    @Override
    public String completeActivity(String processId, String activityId, String x_remote_user, Boolean redirect) {
        ManualActivityInstance act = new ManualActivityInstance();
        act.setState(SharkConstants.STATE_CLOSED_COMPLETED);
        return editActivity(processId, activityId, redirect, act);
    }

    @Transactional
    @Override
    @Deprecated
    public String finishActivity(String processId, String activityId, String x_remote_user) {
        ManualActivityInstance act = new ManualActivityInstance();
        act.setState(SharkConstants.STATE_CLOSED_COMPLETED);
        return editActivity(processId, activityId, false, act);
    }

    //@Transactional
    @Override
    public String startActivity(String processId, String activityId, String x_remote_user) {
        try {
            WMSessionHandle shandle = processesResourceIntr.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            processesResourceIntr.startActivity(shandle, processId, activityId);
            processesResourceIntr.reevaluateDeadlinesForProcesses(shandle, processId);
            processesResourceIntr.reevaluateAssignmentsForProcesses(shandle, processId);
            return "OK";
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Transactional
    @Override
    public String checkProcessDeadlines(String processId) {
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            SharkInterfaceWrapper.getShark().getExecutionAdministration().checkDeadlinesForProcesses(shandle, new String[]{processId});
            SharkInterfaceWrapper.getShark().getExecutionAdministration().reevaluateDeadlinesForProcesses(shandle, new String[]{processId});
            return "ok";
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Transactional
    @Override
    public String reevaluateAssignments(String processId) {
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            SharkInterfaceWrapper.getShark().getExecutionAdministration().reevaluateAssignmentsForProcesses(shandle, new String[]{processId}, true);
            return "ok";
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    /*
     @Transactional
     @Override
     public ActivityInstance getPreviousActivity(String processId, String activityId,Boolean insideSameProcess) {
     try {
     WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
     AdminMiscExt adminMiscExt=SharkInterfaceWrapper.getShark().getAdminMiscExtension();
     WMActivityInstance act=adminMiscExt.getPrevious(shandle, processId, activityId, insideSameProcess);
     return null;
     } catch (Exception ex) {
     throw new RuntimeException(ex);
     }
     }
     */
    @Override
    @Transactional
    public Response checkDeadlines(final String filter, Boolean async) {
        processesResourceIntr.setSearchContext(searchContext);
        if (Boolean.TRUE.equals(async)) {
            return asyncTaskManager.execute(new Callable() {
                @Override
                public Object call() throws Exception {
                    processesResourceIntr.checkDeadlinesWithFiltering(filter);
                    return Response.ok("ok").build();
                }
            }, uriInfo);
        } else {
            processesResourceIntr.checkDeadlinesWithFiltering(filter);
            return Response.ok("ok").build();

        }
    }

    @Transactional
    @Override
    public String acceptActivity(String processId, String activityId, String x_remote_user) {

        try {
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            AssignmentFilterBuilder afb = SharkInterfaceWrapper.getShark().getAssignmentFilterBuilder();
            WMFilter f = afb.addUsernameEquals(shandle, AuthorizationHandler.getAuthorisedUser());
            f = afb.and(shandle, f, afb.addProcessIdEquals(shandle, processId));
            f = afb.and(shandle, f, afb.addActivityIdEquals(shandle, activityId));
            WMWorkItem[] wiList = wapi.listWorkItems(shandle, f, true).getArray();
            if (wiList != null && wiList.length != 0) {
                WMWorkItem wi = wiList[0];
                if (wi.getState().equals(WMWorkItemState.OPEN_NOTRUNNING)) {
                    wapi.changeWorkItemState(shandle, processId, wiList[0].getId(), WMWorkItemState.OPEN_RUNNING);
                    SharkInterfaceWrapper.getShark().getExecutionAdministration().reevaluateDeadlinesForProcesses(shandle, new String[]{processId});
                } else if (!wi.getState().equals(WMWorkItemState.OPEN_RUNNING)) {
                    throw new WebApplicationException("Некорретное состояние активности " + wi.getState().stringValue(), 450);
                }
            } else {
                throw new WebApplicationException("Нет доступа к процессу", 453);
            }
            return activityId;
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Transactional
    @Override
    public String unacceptActivity(String processId, String activityId, String x_remote_user) {
        ManualActivityInstance act = new ManualActivityInstance();
        act.setState(SharkConstants.STATE_OPEN_NOT_RUNNING_NOT_STARTED);
        return editActivity(processId, activityId, false, act);
    }

    @Transactional
    @Override
    public String abortActivity(String processId, String activityId, String x_remote_user) {
        ManualActivityInstance act = new ManualActivityInstance();
        act.setState(SharkConstants.STATE_CLOSED_ABORTED);
        return editActivity(processId, activityId, false, act);
    }

    @Transactional
    @Override
    public String terminateActivity(String processId, String activityId, String x_remote_user, Boolean redirect) {
        ManualActivityInstance act = new ManualActivityInstance();
        act.setState(SharkConstants.STATE_CLOSED_TERMINATED);
        return editActivity(processId, activityId, redirect, act);
    }

    @Transactional
    @Override
    public void reassignActivity(String processId, String activityId, String sourceUser, String targetUser) {
        try {
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            String wid = MiscUtilities.createAssignmentKey(activityId, sourceUser);
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            wapi.reassignWorkItem(shandle, sourceUser, targetUser, processId, wid);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    public DataInstance getDataInstance(String processId, String dataInstanceId) {
        List<String> xpilprop = new ArrayList<>();
        xpilprop.add("FILL_PROCESS_VARIABLES");

        WorkflowProcessInstance mainworkflowprocessinstance = getProcess(processId, xpilprop);
        return mainworkflowprocessinstance.getDataInstance(dataInstanceId);
    }

    @Override
    public void addDataInstance(String processId, String dataInstanceId, DataInstance datainstance) {
        DataInstance orig = getDataInstance(processId, dataInstanceId);
        if (orig != null) {
            if (!orig.getClass().isAssignableFrom(datainstance.getClass())) {
                throw new WebApplicationException(orig.getClass().toString() + " cannot be assigned from " + datainstance.getClass().toString());
            }
            if (orig.getClass().isAssignableFrom(StringArrayDataInstance.class)) {
                ((StringArrayDataInstance) orig).getStringValues().addAll(((StringArrayDataInstance) datainstance).getStringValues());
                datainstance = orig;
            }
        }
        try {
            DataInstances dataInstances = new DataInstances();
            dataInstances.getStringDataInstancesAndStringArrayDataInstancesAndBooleanDataInstances().add(datainstance);
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            XPILJAXBWrapper.setProcessVariables(shandle, dataInstances, processId);
            try {
                SharkInterfaceWrapper.getShark().getExecutionAdministration().reevaluateDeadlinesForProcesses(shandle, new String[]{processId});
            } catch (Exception ex) {
                if (!ex.getMessage().contains("closed")) {
                    throw new RuntimeException(ex);
                }
            }
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    @Transactional
    public void completeProcessInstance(String processId, String x_remote_user, Boolean redirect) {
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            ActivityFilterBuilder fb = SharkInterfaceWrapper.getShark().getActivityFilterBuilder();
            WMFilter f = fb.addProcessIdEquals(shandle, processId);
            f = fb.and(shandle, f, fb.addStateStartsWith(shandle, SharkConstants.STATEPREFIX_OPEN));
            WMActivityInstance[] acts = wapi.listActivityInstances(shandle, f, true).getArray();
            if (acts.length > 0) {
                completeActivity(processId, acts[0].getId(), x_remote_user, redirect);
            } else {
                throw new WebApplicationException("Нет доступных этапов", 454);
            }
        } catch (RuntimeException ex) {
            throw ex;
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    @Transactional
    public void setProcessLimit(String processId, LocalDateTime limit) {
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            SharkInterfaceWrapper.getShark().getExecutionAdministration().setProcessLimit(shandle, processId, limit.atZone(ZoneId.systemDefault()).toInstant().toEpochMilli());
            try {
                SharkInterfaceWrapper.getShark().getExecutionAdministration().reevaluateDeadlinesForProcesses(shandle, new String[]{processId});
            } catch (Exception ex) {
                if (!ex.getMessage().contains("closed")) {
                    throw new RuntimeException(ex);
                }
            }
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }
}
