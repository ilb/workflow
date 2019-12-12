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

import java.util.function.Supplier;
import java.util.stream.Stream;
import javax.inject.Named;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import ru.ilb.workflow.entities.ProcessDefinition;
import ru.ilb.workflow.entities.ProcessDefinitionFactory;
import ru.ilb.workflow.utils.WAPIUtils;

@Named
public class ProcessDefinitionFactoryImpl implements ProcessDefinitionFactory {

    private final Supplier<SessionData> sessionHandleSupplier;

    public ProcessDefinitionFactoryImpl(Supplier<SessionData> sessionHandleSupplier) {
        this.sessionHandleSupplier = sessionHandleSupplier;
    }

    @Override
    public Stream<ProcessDefinition> getProcessDefinitions(Boolean enabled, String packageId, String versionId, String processDefinitionId) {
        try {
            WMSessionHandle shandle = sessionHandleSupplier.get().getSessionHandle();
            return Stream.of(WAPIUtils.getProcessDefinitions(shandle, enabled, packageId, versionId, processDefinitionId))
                    .map(wmpd -> new ProcessDefinitionImpl(wmpd));
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

}
