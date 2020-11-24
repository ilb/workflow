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

import java.util.ArrayList;
import java.util.List;
import java.util.function.Supplier;
import java.util.stream.Stream;
import javax.inject.Named;
import org.enhydra.shark.api.client.wfmc.wapi.WAPI;
import org.enhydra.shark.api.client.wfmc.wapi.WMFilter;
import org.enhydra.shark.api.client.wfmc.wapi.WMProcessDefinition;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.common.ProcessMgrFilterBuilder;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import ru.ilb.workflow.entities.ProcessDefinition;
import ru.ilb.workflow.entities.ProcessDefinitionFactory;

@Named
public class ProcessDefinitionFactoryImpl implements ProcessDefinitionFactory {

    private final Supplier<SessionData> sessionDataSupplier;

    public ProcessDefinitionFactoryImpl(Supplier<SessionData> sessionDataSupplier) {
        this.sessionDataSupplier = sessionDataSupplier;
    }

    @Override
    public Stream<ProcessDefinition> getProcessDefinitions(Boolean enabled, String packageId, String versionId, String processDefinitionId) {
        try {
            WMSessionHandle shandle = sessionDataSupplier.get().getSessionHandle();
            return Stream.of(getProcessDefinitions(shandle, enabled, packageId, versionId, processDefinitionId))
                    .map(wmpd -> new ProcessDefinitionImpl(shandle, wmpd));
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    private static WMProcessDefinition[] getProcessDefinitions(WMSessionHandle shandle, Boolean enabled, String packageId, String versionId, String processDefinitionId) throws Exception {
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
            filter = fb.andForArray(shandle, filters.toArray(new WMFilter[0]));
        }
        WMProcessDefinition[] mgrs = wapi.listProcessDefinitions(shandle, filter, false).getArray();

        return mgrs;

    }


}
