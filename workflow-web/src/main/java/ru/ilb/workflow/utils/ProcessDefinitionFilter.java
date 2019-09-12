/*
 * Copyright 2019 chunaev.
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
import java.util.Iterator;
import java.util.List;
import javax.inject.Named;
import org.enhydra.shark.api.client.wfmc.wapi.WMProcessDefinition;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.common.SharkConstants;
import org.enhydra.shark.api.internal.usergroup.UserGroupManager;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;

/**
 *
 * @author chunaev
 */
@Named
public class ProcessDefinitionFilter {

    public WMProcessDefinition[] filterAccessible(WMProcessDefinition[] processDefinitions, String userName, WMSessionHandle shandle) throws Exception {

        List<WMProcessDefinition> permitedProcesses = new ArrayList();
        for (WMProcessDefinition processDefinition : processDefinitions) {

            List<String> resp = XPDLUtils.getResponsibles(shandle, null, processDefinition.getName());
            if (resp.size() == 0) {
                continue;
            }
            UserGroupManager ugm = (UserGroupManager) SharkInterfaceWrapper.getShark().getPlugIn(SharkConstants.PLUGIN_USER_GROUP);
            boolean isResponsible = false;
            Iterator<String> it = resp.iterator();
            while (it.hasNext() && !isResponsible) {
                isResponsible = ugm.doesUserBelongToGroup(shandle, it.next(), userName);
            }
            if (isResponsible) {
                permitedProcesses.add(processDefinition);
            }

        }
        return permitedProcesses.toArray(new WMProcessDefinition[permitedProcesses.size()]);
    }
}
