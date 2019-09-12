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
import org.enhydra.shark.api.client.wfmc.wapi.WMProcessDefinition;
import org.mapstruct.Mapper;
import org.mapstruct.Mapping;
import ru.ilb.workflow.view.ProcessDefinition;
import ru.ilb.workflow.view.ProcessDefinitions;

/**
 *
 * @author slavb
 */
@Mapper
public abstract class ProcessDefinitionMapper implements GenericMapperDto<WMProcessDefinition, ProcessDefinition> {

    @Override
    @Mapping(target = "enabled",
            expression = "java( \"enabled\".equals(entity.getState().stringValue()) )")
    public abstract ProcessDefinition createFromEntity(WMProcessDefinition entity);

    public ProcessDefinitions createWrapperFromEntities(List<WMProcessDefinition> entities) {
        return new ProcessDefinitions().withProcessDefinitions(createFromEntities(entities));
    }

}
