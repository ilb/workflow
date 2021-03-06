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

import java.util.List;
import java.util.Map;

/**
 *
 * @author slavb
 */
public interface ActivityDefinition {

    /**
     * Get activity definition variables
     * map key is variable name
     * map value is "readonly" state: true - variable is readonly, false - variable can be updated
     *
     * @return
     */
    Map<String, Boolean> getActivityVariables();

    /**
     * get activity formal parameters
     *
     * @return
     */
    List<FormalParameter> getFormalParameters();

    String getExtendedAttribute(String name);
}
