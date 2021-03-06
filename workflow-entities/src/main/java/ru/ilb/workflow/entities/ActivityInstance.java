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

import java.net.URI;

/**
 *
 * @author slavb
 */
public interface ActivityInstance {

    String getId();

    ActivityDefinition getActivityDefinition();

    /**
     * get process instance of activity
     *
     * @return
     */
    ProcessInstance getProcessInstance();

    /**
     * get context of activity (values as raw objects, e.g. dates)
     *
     * @return
     */
    ProcessContext getContext();

    /**
     * get serialized context of activity (values as primitives / strings)
     *
     * @return
     */
    ProcessContext getSerializedContext();

    /**
     * get link to activity form
     *
     * @return
     */
    URI getActivityFormUrl();

    String getActivityDefinitionId();

    State getState();

    /**
     * changes state of the activity
     *
     * @param state requested state
     * @return is state changed
     */
    boolean changeState(String state);

    /**
     * completes the activity
     *
     * @return is state changed (e.g. complete completed activity result = false)
     */
    boolean complete();

    /**
     * terminates the activity
     *
     * @return is state changed (e.g. teriminate terminated activity result = false)
     */
    boolean terminate();

    /**
     * aborts the activity
     *
     * @return is state changed (e.g. abort aborted activity result = false)
     */
    boolean abort();

}
