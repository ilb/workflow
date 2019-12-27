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
package ru.ilb.workflow.core;

import java.util.List;
import java.util.Map;
import java.util.stream.Collectors;
import java.util.stream.Stream;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.client.wfservice.AdminMisc;
import org.enhydra.shark.api.client.wfservice.WMEntity;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import org.enhydra.shark.utilities.wmentity.WMEntityUtilities;
import ru.ilb.workflow.entities.ActivityDefinition;
import ru.ilb.workflow.entities.FormalParameter;

public class ActivityDefinitionImpl implements ActivityDefinition {

    private static final String EA_VAR_TO_PROCESS = "VariableToProcess_";
    private static final String EA_VAR_TO_PROCESS_UPDATE = "VariableToProcess_UPDATE";
    private static final String EA_VAR_TO_PROCESS_VIEW = "VariableToProcess_VIEW";

    private final WMSessionHandle shandle;

    private Map<String, Boolean> activityVariables;

    private WMEntity entity;

    public ActivityDefinitionImpl(WMSessionHandle shandle, String processId, String activityId) {
        this.shandle = shandle;
        try {
            AdminMisc am = SharkInterfaceWrapper.getShark().getAdminMisc();
            entity = am.getActivityDefinitionInfo(shandle, processId, activityId);
        } catch (Exception ex) {
            throw new WorkflowException(ex);
        }
    }

    @Override
    public Map<String, Boolean> getActivityVariables() {
        if (activityVariables == null) {
            try {
                String[][] extAttribs = WMEntityUtilities.getExtAttribNVPairs(shandle, SharkInterfaceWrapper.getShark().getXPDLBrowser(), entity);

                Map<String, Boolean> result = Stream.of(extAttribs)
                        .filter(extAttrib -> extAttrib[0].startsWith(EA_VAR_TO_PROCESS))
                        .collect(Collectors.toMap(extAttrib -> extAttrib[1], extAttrib -> extAttrib[0].equals(EA_VAR_TO_PROCESS_VIEW)));
                return result;
            } catch (Exception ex) {
                throw new WorkflowException(ex);
            }
        }
        return activityVariables;
    }

    @Override
    public List<FormalParameter> getFormalParameters() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

}
