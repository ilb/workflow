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
package ru.ilb.workflow.core;

import ru.ilb.workflow.entities.FormalParameter;

/**
 *
 * @author slavb
 */
public class FormalParameterImpl extends DataFieldImpl implements FormalParameter {

    private final Mode mode;

    public FormalParameterImpl(String id, String name, boolean isArray, Mode mode) {
        super(id, name, isArray);
        this.mode = mode;
    }



    @Override
    public Mode getMode() {
        return mode;
    }

//    @Override
//    public void setMode(Mode mode) {
//        this.mode = mode;
//    }

}
