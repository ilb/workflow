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

import ru.ilb.jfunction.map.accessors.MapAccessor;

/**
 *
 * @author slavb
 */
public interface ProcessInstance {

    public String getId();

    /**
     * get activity context
     * @return
     */
    public ProcessContext getContext();

    /**
     * get activity context accessor
     * @return
     */
    public MapAccessor getContextAccessor();

    /**
     * get activity instance by id
     * @param activityInstanceId
     * @return
     */
    public ActivityInstance getActivityInstance(String activityInstanceId);

    /**
     * get next running accessible activity for session user
     * @return
     */
    public ActivityInstance getNextActivityInstance();

    /**
     * starts the process
     */
    public void start();
}