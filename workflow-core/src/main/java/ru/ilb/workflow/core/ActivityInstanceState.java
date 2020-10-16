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
package ru.ilb.workflow.core;

import org.enhydra.shark.api.client.wfmc.wapi.WMActivityInstanceState;
import ru.ilb.workflow.entities.State;
import ru.ilb.workflow.entities.StateCode;

/**
 *
 * @author slavb
 */
public class ActivityInstanceState implements State {

    private final WMActivityInstanceState delegate;

    public ActivityInstanceState(WMActivityInstanceState delagate) {
        this.delegate = delagate;
    }

    @Override
    public StateCode getCode() {
        return StateCode.valueOf(delegate.stringValue());
    }

    @Override
    public boolean getOpen() {
        return delegate.isOpen();
    }

}
