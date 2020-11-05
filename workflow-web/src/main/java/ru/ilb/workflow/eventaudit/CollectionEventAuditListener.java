/*
 * Copyright 2016 slavb.
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
package ru.ilb.workflow.eventaudit;

import java.util.Date;
import java.util.UUID;
import javax.annotation.Resource;
import org.enhydra.shark.api.client.wfmc.wapi.WAPI;
import org.enhydra.shark.api.client.wfmc.wapi.WMAttribute;
import org.enhydra.shark.api.client.wfmc.wapi.WMProcessInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.internal.eventaudit.StateEventAuditPersistenceObject;
import org.enhydra.shark.eventaudit.notifying.EventAuditEvent;
import org.enhydra.shark.eventaudit.notifying.EventAuditListener;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import org.slf4j.LoggerFactory;
import ru.ilb.collection.api.CollectcasesResource;
import ru.ilb.workflow.job.ReevaluateAssignments;
import ru.ilb.workflow.toolagent.ProcessToolAgent;

/**
 *
 * @author slavb
 */
public class CollectionEventAuditListener implements EventAuditListener {

    @Resource(name = "collectionProxy")
    private CollectcasesResource collectionProxy;

    private static final org.slf4j.Logger logger = LoggerFactory.getLogger(ReevaluateAssignments.class);

    @Override
    public void eventAuditChanged(WMSessionHandle shandle, EventAuditEvent e) {
        try {
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            String processId = e.getPersister().getProcessId();
            if ("collection_activity".equals(e.getPersister().getProcessDefinitionId())) {

                logger.info("collection_activity processId = " + processId + " start");

                if (e.getPersister() instanceof StateEventAuditPersistenceObject && "processStateChanged".equals(e.getPersister().getType())) {
                    StateEventAuditPersistenceObject se = (StateEventAuditPersistenceObject) e.getPersister();

                    WMAttribute clientUUIDAttr = wapi.getProcessInstanceAttributeValue(shandle, processId, "clientUUID");
                    String clientUUID = clientUUIDAttr.getValue() != null ? ((String[]) clientUUIDAttr.getValue())[0] : null;

                    logger.info("collection_activity processId = " + processId + " UID = " + clientUUID + " se.getNewState() = " + se.getNewState());

                    if ("open.running".equals(se.getNewState()) && clientUUID != null) {
                        WMAttribute eventStartAttr = wapi.getProcessInstanceAttributeValue(shandle, processId, "EVENT_start");
                        if (eventStartAttr.getValue() != null) {
                            Date EVENT_start = new Date(((Date) eventStartAttr.getValue()).getTime());
                            logger.info("setNextActivityDate EVENT_start = " + EVENT_start + "processId = " + processId + " UID = " + clientUUID);
                            collectionProxy.setNextActivityDate(UUID.fromString(clientUUID), (Date) EVENT_start, Boolean.FALSE);
                            collectionProxy.setLastActivityCommentDate(UUID.fromString(clientUUID), (new Date()));
                        }
                    }
                    if (("closed.completed".equals(se.getNewState()) || "closed.terminated".equals(se.getNewState())) && clientUUID != null) {
                        //WMProcessInstance proc = wapi.getProcessInstance(shandle, processId);
                        //завершение процесса
                        if ("closed.completed".equals(se.getNewState())) {
                            logger.info("closed.completed");
                            Date finishedDate = new Date(SharkInterfaceWrapper.getShark().getExecutionAdministration().getProcessLimit(shandle, processId));
                            logger.info("state closed.completed Finished = " + finishedDate.toString());
                            collectionProxy.setLastActivityDate(UUID.fromString(clientUUID), finishedDate);
                        }
                        //процесс отклонен
                        if ("closed.terminated".equals(se.getNewState())) {
                            logger.info("state closed.terminated");
                        }
                        //пересчет новой даты следующей активности
                        Date newNextActivityDate = null;
                        WMProcessInstance[] processList = ProcessToolAgent.getProcessList(shandle, "state==open.running;processDefId==collection_activity;DataInstances.clientUUID==" + clientUUID);
                        for (WMProcessInstance procOpen : processList) {
                            if (!procOpen.getId().equals(processId)) {
                                WMAttribute eventStartAttr = wapi.getProcessInstanceAttributeValue(shandle, procOpen.getId(), "EVENT_start");
                                if (eventStartAttr.getValue() != null) {
                                    Date EVENT_start = new Date(((Date) eventStartAttr.getValue()).getTime());
                                    if (newNextActivityDate == null || EVENT_start.before(newNextActivityDate)) {
                                        newNextActivityDate = EVENT_start;
                                    }
                                }
                            }
                        }
                        if (newNextActivityDate == null) {
                            logger.info("newNextActivityDate = null");
                        } else {
                            logger.info("newNextActivityDate = " + newNextActivityDate.toString());
                        }
                        collectionProxy.setNextActivityDate(UUID.fromString(clientUUID), newNextActivityDate, Boolean.TRUE);
                    }
                }
            }
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

}
