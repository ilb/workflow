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

import javax.inject.Inject;
import org.enhydra.shark.api.client.wfmc.wapi.WMProcessInstanceState;
import org.mapstruct.AfterMapping;
import org.mapstruct.Mapper;
import org.mapstruct.Mapping;
import org.mapstruct.MappingTarget;
import ru.ilb.workflow.view.ProcessInstanceState;

/**
 *
 * @author slavb
 */
@Mapper
public abstract class ProcessInstanceStateMapper implements GenericMapperDto<WMProcessInstanceState, ProcessInstanceState> {

    @Inject
    StateConvertor stateConvertor;

    @Override
    @Mapping(target = "code",
            expression = "java( ru.ilb.workflow.core.StateCode.fromValue(entity.stringValue()) )")
    public abstract ProcessInstanceState createFromEntity(WMProcessInstanceState entity);

    @AfterMapping
    protected void afterMapping(@MappingTarget ProcessInstanceState state, WMProcessInstanceState dto) {
        state.setName(stateConvertor.convert(dto.stringValue()));
    }

}
