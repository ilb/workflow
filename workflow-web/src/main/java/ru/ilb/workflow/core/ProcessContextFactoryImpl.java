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
import javax.inject.Inject;
import javax.inject.Named;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import ru.ilb.jfunction.map.accessors.MapAccessor;
import ru.ilb.jfunction.map.accessors.MapAccessorImpl;
import ru.ilb.workflow.entities.ProcessContext;
import ru.ilb.workflow.entities.ProcessContextFactory;

@Named
public class ProcessContextFactoryImpl implements ProcessContextFactory {

    private final Supplier<WMSessionHandle> sessionHandleSupplier;

    @Inject
    public ProcessContextFactoryImpl(Supplier<WMSessionHandle> sessionHandleSupplier) {
        this.sessionHandleSupplier = sessionHandleSupplier;
    }


    @Override
    public ProcessContext getProcessContext(String processInstanceId) {
        return new ProcessContextImpl(sessionHandleSupplier.get(), processInstanceId);
    }

    @Override
    public MapAccessor getContextAccessor(String processInstanceId) {
        return new MapAccessorImpl(getProcessContext(processInstanceId).getContext());
    }

}
