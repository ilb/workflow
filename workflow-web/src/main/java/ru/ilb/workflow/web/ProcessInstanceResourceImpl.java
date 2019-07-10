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
package ru.ilb.workflow.web;

import java.util.function.Supplier;
import javax.inject.Inject;
import javax.ws.rs.container.ResourceContext;
import javax.ws.rs.core.Context;
import org.apache.cxf.jaxrs.json.basic.JsonMapObject;
import org.enhydra.shark.api.client.wfmc.wapi.WAPI;
import org.enhydra.shark.api.client.wfmc.wapi.WMActivityInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMProcessInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import org.springframework.context.ApplicationContext;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.workflow.api.ActivityInstanceResource;
import ru.ilb.workflow.api.ProcessContextResource;
import ru.ilb.workflow.api.ActivityFormResource;
import ru.ilb.workflow.api.JsonSchemaResource;
import ru.ilb.workflow.api.ProcessDefinitionResource;
import ru.ilb.workflow.api.ProcessInstanceResource;
import ru.ilb.workflow.api.ProcessStepsResource;
import ru.ilb.workflow.mappers.ActivityInstanceMapper;
import ru.ilb.workflow.mappers.ProcessInstanceMapper;
import ru.ilb.workflow.view.ActivityInstance;
import ru.ilb.workflow.view.ProcessInstance;

public class ProcessInstanceResourceImpl implements ProcessInstanceResource {

    private Supplier<WMSessionHandle> sessionHandleSupplier;

    private String processInstanceId;

    @Context
    private ResourceContext resourceContext;

    @Inject
    private ProcessInstanceMapper processInstanceMapper;

    @Inject
    private  ApplicationContext applicationContext;
    
    @Inject
    private ActivityInstanceMapper activityInstanceMapper;

    public ProcessInstanceResourceImpl(Supplier<WMSessionHandle> sessionHandleSupplier, String processInstanceId) {
        this.sessionHandleSupplier = sessionHandleSupplier;
        this.processInstanceId = processInstanceId;
    }

    @Override
    @Transactional
    public ProcessInstance getProcessInstance() {
        try {
            WMSessionHandle shandle = sessionHandleSupplier.get();
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            WMProcessInstance wmProcessInstance = wapi.getProcessInstance(shandle, processInstanceId);
            return processInstanceMapper.createFromEntity(wmProcessInstance);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }

    }

    @Override
    public ActivityInstanceResource getActivityInstanceResource(String activityInstanceId) {
        ActivityInstanceResource resource = new ActivityInstanceResourceImpl(sessionHandleSupplier, processInstanceId, activityInstanceId);
        applicationContext.getAutowireCapableBeanFactory().autowireBean(resource);
        return resourceContext.initResource(resource);
    }

    @Override
    public ProcessDefinitionResource getProcessDefinitionResource() {
        return resourceContext.initResource(new ProcessDefinitionResourceImpl(sessionHandleSupplier,processInstanceId , null));
    }

    @Override
    public ProcessStepsResource getProcessStepsResource() {
        return resourceContext.initResource(new ProcessStepsResourceImpl(sessionHandleSupplier, processInstanceId, null));
    }

    @Override
    public JsonSchemaResource getJsonSchemaResource() {
        return resourceContext.initResource(new JsonSchemaResourceImpl(sessionHandleSupplier, processInstanceId, null));

    }

    @Override
    public ActivityFormResource getActivityFormResource() {
        return resourceContext.initResource(new ActivityFormResourceImpl(sessionHandleSupplier, processInstanceId, null));
    }

    @Override
    public ProcessContextResource getProcessContextResource() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    @Transactional
    public boolean start(JsonMapObject jsonmapobject) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    @Transactional
    public boolean suspend(JsonMapObject jsonmapobject) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    @Transactional
    public boolean resume(JsonMapObject jsonmapobject) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    @Transactional
    public boolean terminate(JsonMapObject jsonmapobject) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    @Transactional
    public boolean abort(JsonMapObject jsonmapobject) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
    @Override
    @Transactional
    public ActivityInstance goBack(JsonMapObject jsonmapobject) {
        try {
            WMSessionHandle shandle = sessionHandleSupplier.get();
            WMActivityInstance activityInstance = SharkInterfaceWrapper.getShark().getExecutionAdministrationExtension().goBack(shandle, processInstanceId, true, null);
            return activityInstanceMapper.createFromEntity(activityInstance);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    @Transactional
    public ActivityInstance goForth(JsonMapObject jsonmapobject) {
        // use SharkInterfaceWrapper.getShark().getExecutionAdministrationExtension().goForth
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    @Transactional
    public ActivityInstance goAnywhere(String activityInstanceId, String activityDefinitionId, JsonMapObject jsonmapobject) {
        // use SharkInterfaceWrapper.getShark().getExecutionAdministrationExtension().goAnywhere
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

}
