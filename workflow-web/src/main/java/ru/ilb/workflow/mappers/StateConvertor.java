/*
 * Copyright 2019 chunaev.
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

import javax.inject.Named;
import org.enhydra.shark.api.common.SharkConstants;

/**
 *
 * @author chunaev
 */
@Named
public class StateConvertor {

    public String convert(String value) {
        if (SharkConstants.STATE_OPEN_NOT_RUNNING_NOT_STARTED.equals(value)) {
            return "Создан";
        } else if (SharkConstants.STATE_OPEN_NOT_RUNNING_SUSPENDED.equals(value)) {
            return "Приостановлен";
        } else if (SharkConstants.STATE_OPEN_RUNNING.equals(value)) {
            return "В работе";
        } else if (SharkConstants.STATE_CLOSED_COMPLETED.equals(value)) {
            return "Завершен";
        } else if (SharkConstants.STATE_CLOSED_TERMINATED.equals(value)) {
            return "Прерван";
        } else if (SharkConstants.STATE_CLOSED_ABORTED.equals(value)) {
            return "Отменен";
        }
    return null;
    }
}
