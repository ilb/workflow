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

import java.net.URI;
import org.enhydra.shark.api.client.wfmc.wapi.WAPI;
import org.enhydra.shark.api.client.wfmc.wapi.WMActivityInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMActivityInstanceState;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.common.SharkConstants;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import ru.ilb.workflow.entities.ActivityDefinition;
import ru.ilb.workflow.entities.ActivityInstance;
import ru.ilb.workflow.entities.ProcessContext;
import ru.ilb.workflow.entities.ProcessInstance;
import ru.ilb.workflow.entities.State;
import ru.ilb.workflow.utils.WorkflowUtils;

public class ActivityInstanceImpl implements ActivityInstance {

    private final WMSessionHandle shandle;

    private WMActivityInstance delegate;

    private final ProcessInstance processInstance;

    private final String id;

    private ActivityDefinition activityDefinition;

    private ProcessContext context;

    public ActivityInstanceImpl(WMSessionHandle shandle, ProcessInstance processInstance, String activityInstanceId) {
        this.shandle = shandle;
        this.processInstance = processInstance;
        this.id = activityInstanceId;
    }

    public ActivityInstanceImpl(WMSessionHandle shandle, ProcessInstance processInstance, WMActivityInstance delegate) {
        this.shandle = shandle;
        this.processInstance = processInstance;
        this.delegate = delegate;
        this.id = delegate.getId();
    }

    /**
     * lazy load delegate
     *
     * @return
     */
    private WMActivityInstance getDelegate() {

        if (delegate == null) {
            try {
                WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
                delegate = wapi.getActivityInstance(shandle, processInstance.getId(), id);
            } catch (Exception ex) {
                throw new RuntimeException(ex);
            }
        }
        return delegate;
    }

    @Override
    public ActivityDefinition getActivityDefinition() {
        if (activityDefinition == null) {
            activityDefinition = new ActivityDefinitionImpl(shandle, processInstance.getId(), id);
        }
        return activityDefinition;
    }

    @Override
    public ProcessContext getContext() {
        if (context == null) {
            context = new ActivityContextImpl(shandle, this);
        }
        return context;
    }

    @Override
    public ProcessContext getSerializedContext() {
        return new SerializedContextAccessor(getContext());
    }

    @Override
    public String getId() {
        return id;
    }

    @Override
    public URI getActivityFormUrl() {
        String url = WorkflowUtils.getActivityFormUrl(shandle, null, processInstance.getId(), getActivityDefinitionId(), getId());
        return URI.create(url);
    }

    @Override
    public String getActivityDefinitionId() {
        return getDelegate().getActivityDefinitionId();
    }

    @Override
    public boolean changeState(String state) {
        try {
            return changeActivityStateInternal(shandle, getDelegate(), state);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    public boolean complete() {
        try {
            return changeActivityStateInternal(shandle, getDelegate(), SharkConstants.STATE_CLOSED_COMPLETED);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    public boolean terminate() {
        try {
            return changeActivityStateInternal(shandle, getDelegate(), SharkConstants.STATE_CLOSED_TERMINATED);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    public boolean abort() {
        try {
            return changeActivityStateInternal(shandle, getDelegate(), SharkConstants.STATE_CLOSED_ABORTED);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    public ProcessInstance getProcessInstance() {
        return processInstance;
    }

    private static Boolean changeActivityStateInternal(WMSessionHandle shandle, WMActivityInstance act, String state) throws Exception {
        Boolean changed = false;
        if (state != null) {
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            String procId = act.getProcessInstanceId();
            String actId = act.getId();
            String oldState = act.getState().stringValue();

            if (!oldState.equals(state)) {
                if (oldState.equals(SharkConstants.STATE_OPEN_NOT_RUNNING_NOT_STARTED) && state.equals(SharkConstants.STATE_CLOSED_COMPLETED)) {
                    wapi.changeActivityInstanceState(shandle, procId, actId, WMActivityInstanceState.valueOf(SharkConstants.STATE_OPEN_RUNNING));
                }
                wapi.changeActivityInstanceState(shandle, procId, actId, WMActivityInstanceState.valueOf(state));
                act.setState(WMActivityInstanceState.valueOf(state));
                changed = true;
            }
        }
        return changed;
    }

    @Override
    public State getState() {
        return new ActivityInstanceState(getDelegate().getState());
    }

}
