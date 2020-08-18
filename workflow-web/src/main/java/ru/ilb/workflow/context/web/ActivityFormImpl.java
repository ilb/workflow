/*
 * Copyright 2020 slavb.
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

import javax.ws.rs.core.Response;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.workflow.api.ActivityForm;
import ru.ilb.workflow.entities.ActivityInstance;
import ru.ilb.workflow.entities.ProcessInstance;
import ru.ilb.workflow.entities.ProcessInstanceFactory;

/**
 *
 * @author slavb
 */
public class ActivityFormImpl implements ActivityForm {

    private final ProcessInstanceFactory processInstanceFactory;

    public ActivityFormImpl(ProcessInstanceFactory processInstanceFactory) {
        this.processInstanceFactory = processInstanceFactory;
    }

    @Override
    @Transactional
    public Response activityForm(String x_remote_user, String callId, String callerId) {
        String processInstanceId = callerId, activityInstanceId = callId;

        ProcessInstance processInstance = processInstanceFactory.getProcessInstance(processInstanceId);
        ActivityInstance activityInstance = processInstance.getActivityInstance(activityInstanceId);
        return Response.seeOther(activityInstance.getActivityFormUrl()).build();
    }

}
