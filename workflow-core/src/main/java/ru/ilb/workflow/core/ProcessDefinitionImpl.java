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

import java.util.Map;
import java.util.stream.Collectors;
import org.enhydra.jxpdl.XMLCollectionElement;
import org.enhydra.jxpdl.elements.DataFields;
import org.enhydra.jxpdl.elements.WorkflowProcess;
import org.enhydra.shark.api.client.wfmc.wapi.WAPI;
import org.enhydra.shark.api.client.wfmc.wapi.WMProcessDefinition;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import ru.ilb.workflow.entities.DataField;
import ru.ilb.workflow.entities.FormalParameter;
import ru.ilb.workflow.entities.ProcessDefinition;
import ru.ilb.workflow.utils.XPDLUtils;

/**
 *
 * @author slavb
 */
public class ProcessDefinitionImpl implements ProcessDefinition {

    private final String id;
    private final WMSessionHandle shandle;
    private WMProcessDefinition delegate;

    private WorkflowProcess workflowProcess;

    public ProcessDefinitionImpl(WMSessionHandle shandle, WMProcessDefinition delegate) {
        this.delegate = delegate;
        this.shandle = shandle;
        this.id = delegate.getId();
    }

    public ProcessDefinitionImpl(WMSessionHandle shandle, String id) {
        try {
            this.shandle = shandle;

            this.id = id;
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    private WMProcessDefinition getDelegate() {
        if (delegate == null) {

            try {
                WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
                this.delegate = wapi.getProcessDefinition(shandle, id);
            } catch (Exception ex) {
                throw new RuntimeException(ex);
            }

        }
        return delegate;
    }

    private WorkflowProcess getWorkflowProcess() {
        if (workflowProcess == null) {
            try {
                workflowProcess = XPDLUtils.getWorkflowProcess(shandle, null, id);
            } catch (Exception ex) {
                throw new RuntimeException(ex);
            }
        }
        return workflowProcess;
    }

    @Override
    public String getId() {
        return getDelegate().getId();
    }

    @Override
    public String getName() {
        return getDelegate().getName();
    }

    @Override
    public String getDescription() {
        return getDelegate().getDescription();
    }

    @Override
    public String getDefinitionName() {
        return getDelegate().getDefinitionName();
    }

    @Override
    public String getPackageId() {
        return getDelegate().getPackageId();
    }

    @Override
    public String getVersion() {
        return getDelegate().getVersion();
    }

    @Override
    public Boolean getEnabled() {
        return "enabled".equals(delegate.getState().stringValue());
    }

    @Override
    public Map<String, FormalParameter> getFormalParameters() {
        throw new UnsupportedOperationException("Not supported yet.");
    }

    @Override
    public Map<String, DataField> getDataFields() {
        Map<String, XMLCollectionElement> map = getWorkflowProcess().getAllVariables();
        DataFields dataFields = getWorkflowProcess().getDataFields();
        Map<String, DataField> result = map.entrySet().stream()
                .map(e -> dataFields.getDataField(e.getKey()))
                .filter(df -> df != null)
                .map(df -> new DataFieldImpl(df))
                .collect(
                        Collectors.toMap(
                                df -> df.getId(),
                                df -> (DataField) df
                        ));
        return result;
    }

}
