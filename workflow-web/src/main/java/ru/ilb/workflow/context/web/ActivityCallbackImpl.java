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
package ru.ilb.workflow.context.web;

import java.net.URI;
import java.util.function.Supplier;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import ru.ilb.workflow.api.ActivityCallback;

public class ActivityCallbackImpl implements ActivityCallback {

    private final Supplier<WMSessionHandle> sessionHandleSupplier;

    public ActivityCallbackImpl(Supplier<WMSessionHandle> sessionHandleSupplier) {
        this.sessionHandleSupplier = sessionHandleSupplier;
    }

    @Override
    public void activityCallback(String x_remote_user, String callId, String callerId, URI responseUrl) {
        String processInstanceId = callerId, activityInstanceId = callId;
    }
}
