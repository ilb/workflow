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

import java.util.function.Supplier;
import javax.inject.Inject;
import javax.inject.Named;
import javax.ws.rs.Path;
import javax.ws.rs.container.ResourceContext;
import javax.ws.rs.core.Context;
import org.apache.cxf.jaxrs.ext.MessageContext;
import org.springframework.context.ApplicationContext;
import ru.ilb.callcontext.entities.CallContextFactory;
import ru.ilb.workflow.api.ActivityCallback;
import ru.ilb.workflow.api.ActivityContext;
import ru.ilb.workflow.api.ActivityForm;
import ru.ilb.workflow.api.CallcontextResource;
import ru.ilb.workflow.api.StartProcess;
import ru.ilb.workflow.context.InitialProcessContextProvider;
import ru.ilb.workflow.core.SessionData;
import ru.ilb.workflow.entities.ProcessInstanceFactory;
import ru.ilb.workflow.salepoint.SalepointProvider;

@Named
@Path("callcontext")
public class CallcontextResourceImpl implements CallcontextResource {

    protected ResourceContext resourceContext;
    protected MessageContext messageContext;
    private final ApplicationContext applicationContext;
    private final ProcessInstanceFactory processInstanceFactory;

    private final CallContextFactory callContextFactory;

    private final Supplier<SessionData> sessionHandleSupplier;

    private final InitialProcessContextProvider initialProcessContextProvider;

    @Inject
    public CallcontextResourceImpl(ApplicationContext applicationContext, ProcessInstanceFactory processInstanceFactory, CallContextFactory callContextFactory, Supplier<SessionData> sessionHandleSupplier, InitialProcessContextProvider initialProcessContextProvider) {
        this.applicationContext = applicationContext;
        this.processInstanceFactory = processInstanceFactory;
        this.callContextFactory = callContextFactory;
        this.sessionHandleSupplier = sessionHandleSupplier;
        this.initialProcessContextProvider = initialProcessContextProvider;
    }

    @Context
    public void setResourceContext(ResourceContext resourceContext) {
        this.resourceContext = resourceContext;
    }

    @Context
    public void setMessageContext(MessageContext messageContext) {
        this.messageContext = messageContext;
    }

    private <T> T initResource(T resource) {
        applicationContext.getAutowireCapableBeanFactory().autowireBean(resource);
        return resourceContext.initResource(resource);
    }

    @Override
    public StartProcess getStartProcess() {
        return initResource(new StartProcessImpl(processInstanceFactory, callContextFactory, sessionHandleSupplier, initialProcessContextProvider, messageContext.getUriInfo().getAbsolutePath()));
    }

    @Override
    public ActivityContext getActivityContext() {
        return initResource(new ActivityContextImpl(processInstanceFactory, callContextFactory, messageContext.getUriInfo().getAbsolutePath()));
//        return initResource(new ActivityContextImpl(processInstanceFactory, callContextFactory, sessionHandleSupplier, messageContext.getUriInfo().getAbsolutePath()));
    }

    @Override
    public ActivityCallback getActivityCallback() {
        return initResource(new ActivityCallbackImpl(processInstanceFactory, callContextFactory, messageContext.getUriInfo().getAbsolutePath()));
    }

    @Override
    public ActivityForm getActivityForm() {
        return initResource(new ActivityFormImpl(processInstanceFactory));
    }

}
