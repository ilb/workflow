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

import java.util.function.Function;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;

/**
 *
 * @author slavb
 */
public class SessionHandleFunction implements Function<String, WMSessionHandle> {

    @Override
    public WMSessionHandle apply(String authorisedUser) {
        try {
            return SharkInterfaceWrapper.getSessionHandle(authorisedUser, null);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

}
