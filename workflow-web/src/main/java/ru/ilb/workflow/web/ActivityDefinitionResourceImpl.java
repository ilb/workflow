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

import java.util.function.Supplier;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import ru.ilb.workflow.api.ActivityDefinitionResource;
import ru.ilb.workflow.view.ActivityDefinition;

public class ActivityDefinitionResourceImpl implements ActivityDefinitionResource {

    private final Supplier<WMSessionHandle> sessionHandleSupplier;

    private final String processDefinitionId;

    private final String activityDefinitionId;

    public ActivityDefinitionResourceImpl(Supplier<WMSessionHandle> sessionHandleSupplier, String processDefinitionId, String activityDefinitionId) {
        this.sessionHandleSupplier = sessionHandleSupplier;
        this.processDefinitionId = processDefinitionId;
        this.activityDefinitionId = activityDefinitionId;
    }


    @Override
    public ActivityDefinition getActivityDefinition() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

}
