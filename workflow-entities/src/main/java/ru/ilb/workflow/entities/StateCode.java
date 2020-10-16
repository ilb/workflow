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
package ru.ilb.workflow.entities;

import javax.xml.bind.annotation.XmlEnum;
import javax.xml.bind.annotation.XmlEnumValue;

/**
 *
 * @author slavb
 */
@XmlEnum
public enum StateCode {

    @XmlEnumValue("open.not_running.not_started")
    OPEN_NOT_RUNNING_NOT_STARTED("open.not_running.not_started"),
    @XmlEnumValue("open.not_running.suspended")
    OPEN_NOT_RUNNING_SUSPENDED("open.not_running.suspended"),
    @XmlEnumValue("open.running")
    OPEN_RUNNING("open.running"),
    @XmlEnumValue("closed.completed")
    CLOSED_COMPLETED("closed.completed"),
    @XmlEnumValue("closed.terminated")
    CLOSED_TERMINATED("closed.terminated"),
    @XmlEnumValue("closed.aborted")
    CLOSED_ABORTED("closed.aborted");
    private final String value;

    StateCode(String v) {
        value = v;
    }

    public String value() {
        return value;
    }

    public static StateCode fromValue(String v) {
        for (StateCode c: StateCode.values()) {
            if (c.value.equals(v)) {
                return c;
            }
        }
        throw new IllegalArgumentException(v);
    }

}
