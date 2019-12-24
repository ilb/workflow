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
package ru.ilb.workflow.stub;

import ru.ilb.jfunction.map.accessors.MapAccessor;
import ru.ilb.jfunction.map.accessors.MapAccessorImpl;
import ru.ilb.workflow.entities.ActivityInstance;
import ru.ilb.workflow.entities.ProcessContext;
import ru.ilb.workflow.entities.ProcessInstance;

/**
 *
 * @author slavb
 */
public class ProcessInstanceMock implements ProcessInstance{

    ProcessContext context;

    ActivityInstance activityInstance;

    public ProcessInstanceMock(ProcessContext context, ActivityInstance activityInstance) {
        this.context = context;
        this.activityInstance = activityInstance;
    }

    @Override
    public String getId() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public ProcessContext getContext() {
        return context;
    }

    @Override
    public MapAccessor getContextAccessor() {
        return new MapAccessorImpl(getContext().getContext());
    }

    @Override
    public ActivityInstance getActivityInstance(String activityInstanceId) {
        return this.activityInstance;
    }

    @Override
    public ActivityInstance getNextActivityInstance() {
        return this.activityInstance;
    }

    @Override
    public void start() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

}
