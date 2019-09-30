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
package ru.ilb.workflow.web;

import java.util.ArrayList;
import ru.ilb.workflow.utils.XPDLUtils;
import java.util.Iterator;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;
import java.util.function.Supplier;
import org.enhydra.jxpdl.elements.Activity;
import org.enhydra.jxpdl.elements.WorkflowProcess;
import org.enhydra.shark.api.client.wfmc.wapi.WAPI;
import org.enhydra.shark.api.client.wfmc.wapi.WMActivityInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMFilter;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.common.ActivityFilterBuilder;
import org.enhydra.shark.api.common.SharkConstants;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.workflow.api.ProcessStepsResource;
import ru.ilb.workflow.utils.WorkflowUtils;
import ru.ilb.workflow.view.ProcessStep;
import ru.ilb.workflow.view.ProcessSteps;

public class ProcessStepsResourceImpl implements ProcessStepsResource {

    private final Supplier<WMSessionHandle> sessionHandleSupplier;

    private final String processDefinitionId;

    private final String processInstanceId;

    public ProcessStepsResourceImpl(Supplier<WMSessionHandle> sessionHandleSupplier, String processInstanceId, String processDefinitionId) {
        this.sessionHandleSupplier = sessionHandleSupplier;
        this.processDefinitionId = processDefinitionId;
        this.processInstanceId = processInstanceId;
    }

    @Override
    @Transactional
    public ProcessSteps getProcessSteps() {
        try {
            WMSessionHandle shandle = sessionHandleSupplier.get();
            return new ProcessSteps().withProcessSteps(getProcessSteps(shandle, processInstanceId, processDefinitionId));
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    public static List<ProcessStep> getProcessSteps(WMSessionHandle shandle, String processInstanceId, String processDefinitionId) throws Exception {
        WorkflowProcess workflowProcess = XPDLUtils.getWorkflowProcess(shandle, processInstanceId, processDefinitionId);
        Map<String, ProcessStep> stepMap = makeStepMap(shandle, workflowProcess);
        fillStepMap(shandle, stepMap, workflowProcess.getId(), processInstanceId);
        return new ArrayList<>(stepMap.values());
    }

    /**
     * Making map where one activity definitions point to the corresponding list of activity instances.
     *
     * @param shandle
     * @param wp
     * @param procId
     * @return
     * @throws java.lang.Exception
     */
    private static Map<String, ProcessStep> makeStepMap(WMSessionHandle shandle, WorkflowProcess wp) throws Exception {

        Map<String, ProcessStep> stepMap = new LinkedHashMap();
        List activityDefinitions = wp.getActivities().toElements();
        for (Iterator it = activityDefinitions.iterator(); it.hasNext();) {
            Activity activity = (Activity) it.next();
            // manual activity
            if (activity.getActivityType() == 1) {
                stepMap.put(activity.getId(), new ProcessStep()
                        .withKey(activity.getId())
                        .withTitle(activity.getName())
                        .withDescription(activity.getDescription())
                        .withIcon(activity.getIcon())
                        .withDisabled(true));
            }
        }
        return stepMap;
    }

    private static Map<String, ProcessStep> fillStepMap(WMSessionHandle shandle, Map<String, ProcessStep> stepMap, String processDefinitionId, String processInstanceId) throws Exception {

        if (processInstanceId != null) {
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            ActivityFilterBuilder fb = SharkInterfaceWrapper.getShark()
                    .getActivityFilterBuilder();

            WMFilter filter = fb.addProcessIdEquals(shandle, processInstanceId);
            WMActivityInstance[] activitiesInstances = wapi.listActivityInstances(shandle,
                    filter,
                    false)
                    .getArray();

            // Filling relationMap with list of activity instances.
            for (int i = 0; i < activitiesInstances.length; i++) {
                WMActivityInstance wfActivity = activitiesInstances[i];
                String activityDefinitionId = wfActivity.getActivityDefinitionId();

                if (stepMap.containsKey(activityDefinitionId)) {
                    ProcessStep step = stepMap.get(activityDefinitionId);
                    boolean active = wfActivity.getState()
                            .stringValue()
                            .startsWith(SharkConstants.STATEPREFIX_OPEN);
                    boolean completed = wfActivity.getState()
                            .stringValue()
                            .startsWith(SharkConstants.STATEPREFIX_CLOSED);

                    if (step.getActivityId() == null || active) {
                        step.setActivityId(wfActivity.getId());
                        step.setActive(active ? true : null);
                        step.setCompleted(completed ? true : null);
                        step.setDisabled(null);
                        String url = WorkflowUtils.getActivityFormUrl(shandle, processDefinitionId, processInstanceId, activityDefinitionId, wfActivity.getId());
                        step.setHref(url);
                    }
                }
            }
        }

        return stepMap;
    }

}
