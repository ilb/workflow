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
package ru.ilb.workflow.context.web;

import javax.inject.Inject;
import javax.ws.rs.core.Response;
import ru.ilb.workflow.api.ActivityContext;
import ru.ilb.workflow.entities.ProcessContextFactory;


public class ActivityContextImpl implements ActivityContext {

    private final ProcessContextFactory processContextFactory;

    @Inject
    public ActivityContextImpl(ProcessContextFactory processContextFactory) {
        this.processContextFactory = processContextFactory;
    }


    @Override
    public Response activityContext(String x_remote_user, String callId, String callerId) {
        String processInstanceId = callerId, activityInstanceId = callId;
        return null;
    }

}
