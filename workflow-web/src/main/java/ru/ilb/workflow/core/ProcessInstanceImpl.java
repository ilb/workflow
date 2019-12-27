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

import java.util.logging.Level;
import java.util.logging.Logger;
import org.enhydra.shark.api.client.wfmc.wapi.WAPI;
import org.enhydra.shark.api.client.wfmc.wapi.WMActivityInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMProcessInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import ru.ilb.jfunction.map.accessors.MapAccessor;
import ru.ilb.jfunction.map.accessors.MapAccessorImpl;
import ru.ilb.workflow.entities.ActivityInstance;
import ru.ilb.workflow.entities.ProcessContext;
import ru.ilb.workflow.entities.ProcessInstance;
import ru.ilb.workflow.utils.WAPIUtils;

public class ProcessInstanceImpl implements ProcessInstance {

    private final SessionData sessionData;

    private final WMSessionHandle shandle;

    private final String id;

    private WMProcessInstance delegate;

    public ProcessInstanceImpl(SessionData sessionData, String processInstanceId) {
        this.sessionData = sessionData;
        this.shandle = sessionData.getSessionHandle();
        this.id = processInstanceId;
    }

    /**
     * lazy loaded WMProcessInstance delegate
     *
     * @return
     */
    private WMProcessInstance getDelegate() {
        if (delegate == null) {
            try {
                WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
                delegate = wapi.getProcessInstance(shandle, id);
            } catch (Exception ex) {
                throw new RuntimeException(ex);
            }
        }
        return delegate;
    }

    @Override
    public ProcessContext getContext() {
        return new ProcessContextImpl(shandle, id);
    }

    @Override
    public ActivityInstance getActivityInstance(String activityInstanceId) {
        return new ActivityInstanceImpl(shandle, this, activityInstanceId);
    }

    @Override
    public String getId() {
        return id;
    }

    @Override
    public MapAccessor getContextAccessor() {
        return new MapAccessorImpl(getContext().getContext());
    }

    @Override
    public ActivityInstance getNextActivityInstance() {
        WMActivityInstance nextAct = WAPIUtils.findNextActivity(shandle, sessionData.getAuthorisedUser(), id);
        return nextAct != null ? new ActivityInstanceImpl(shandle, this, nextAct) : null;
    }

    @Override
    public void start() {
        try {
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            wapi.startProcess(shandle, id);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

}
