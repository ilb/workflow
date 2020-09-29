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
package ru.ilb.workflow.mappers;

import java.util.List;
import javax.inject.Inject;
import org.enhydra.shark.api.client.wfmc.wapi.WMActivityInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.mapstruct.AfterMapping;
import org.mapstruct.Mapper;
import org.mapstruct.MappingTarget;
import ru.ilb.workflow.entities.ProcessInstance;
import ru.ilb.workflow.entities.ProcessInstanceFactory;
import ru.ilb.workflow.session.SessionDataProvider;
import ru.ilb.workflow.utils.PosixRealm;
import ru.ilb.workflow.utils.WorkflowUtils;
import ru.ilb.workflow.view.ActivityInstance;
import ru.ilb.workflow.view.ActivityInstances;
import ru.ilb.workflow.view.UserType;

/**
 *
 * @author slavb
 */
@Mapper(uses = {ActivityInstanceStateMapper.class, DateTimeMapper.class})
public abstract class ActivityInstanceMapper implements GenericMapperDto<WMActivityInstance, ActivityInstance> {

    @Inject
    private SessionDataProvider sessionDataProvider;

    @Inject
    private ProcessInstanceFactory processInstanceFactory;

    @Override
    public abstract ActivityInstance createFromEntity(WMActivityInstance entity);

    @AfterMapping
    protected void afterMapping(@MappingTarget ActivityInstance dto, WMActivityInstance entity) {
        WMSessionHandle shandle = sessionDataProvider.getSessionData().getSessionHandle();
        String url = WorkflowUtils.getActivityFormUrl(shandle, null, entity.getProcessInstanceId(), entity.getActivityDefinitionId(), entity.getId());
        dto.setActivityFormUrl(url);
        ProcessInstance processInstance = processInstanceFactory.getProcessInstance(entity.getProcessInstanceId());
        String requesterUsername = processInstance.getRequesterUsername();
        dto.setProcessRequesterUser(new UserType(
                requesterUsername,
                PosixRealm.getFioByUser(requesterUsername)
        ));
    }

    public ActivityInstances createWrapperFromEntities(List<WMActivityInstance> entities) {
        return new ActivityInstances().withActivityInstances(createFromEntities(entities));
    }
}
