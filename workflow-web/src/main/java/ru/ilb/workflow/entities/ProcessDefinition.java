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
package ru.ilb.workflow.entities;

/**
 *
 * @author slavb
 */
public interface ProcessDefinition {

    String getDefinitionName();

    String getDescription();

    String getId();

    String getName();

    String getPackageId();

    String getVersion();

    Boolean getEnabled();

//    void setDefinitionName(String definitionName);
//
//    void setDescription(String description);
//
//    void setId(String id);
//
//    void setName(String name);
//
//    void setPackageId(String packageId);
//
//    void setVersion(String version);
//
//    void setEnabled(Boolean enabled);

}
