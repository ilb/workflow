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

import javax.inject.Inject;
import javax.inject.Named;
import javax.ws.rs.container.ResourceContext;
import javax.ws.rs.core.Context;
import org.springframework.context.ApplicationContext;
import ru.ilb.workflow.api.ActivityCallback;
import ru.ilb.workflow.api.ActivityContext;
import ru.ilb.workflow.api.CallcontextResource;
import ru.ilb.workflow.api.StartProcess;
import ru.ilb.workflow.session.SessionDataProvider;

@Named
public class CallcontextResourceImpl implements CallcontextResource {
    protected final ResourceContext resourceContext;
    private final SessionDataProvider sessionDataProvider;
    private final ApplicationContext applicationContext;

    @Inject
    public CallcontextResourceImpl(SessionDataProvider sessionDataProvider, ApplicationContext applicationContext, @Context ResourceContext resourceContext) {
        this.sessionDataProvider = sessionDataProvider;
        this.applicationContext = applicationContext;
        this.resourceContext = resourceContext;
    }

    private<T> T initResource(T resource) {
        applicationContext.getAutowireCapableBeanFactory().autowireBean(resource);
        return resourceContext.initResource(resource);
    }

    @Override
    public StartProcess getStartProcess() {
        return initResource(new StartProcessImpl(sessionDataProvider.getSessionData().getSessionHandleSupplier()));
    }

    @Override
    public ActivityContext getActivityContext() {
        return initResource(new ActivityContextImpl(sessionDataProvider.getSessionData().getSessionHandleSupplier()));
    }

    @Override
    public ActivityCallback getActivityCallback() {
        return initResource(new ActivityCallbackImpl(sessionDataProvider.getSessionData().getSessionHandleSupplier()));
    }

}
