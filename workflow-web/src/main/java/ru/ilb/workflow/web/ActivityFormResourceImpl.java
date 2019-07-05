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
import javax.ws.rs.core.Response;
import org.apache.cxf.jaxrs.json.basic.JsonMapObject;
import org.apache.cxf.jaxrs.json.basic.JsonMapObjectReaderWriter;
import org.enhydra.shark.Shark;
import org.enhydra.shark.api.client.wfmc.wapi.WAPI;
import org.enhydra.shark.api.client.wfmc.wapi.WMActivityInstance;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.client.wfservice.AdminMisc;
import org.enhydra.shark.api.client.wfservice.SharkConnection;
import org.enhydra.shark.api.client.wfservice.WMEntity;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import org.enhydra.shark.utilities.wmentity.WMEntityUtilities;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.jsonschema.jsonschema.JsonSchema;
import ru.ilb.workflow.api.ActivityFormResource;
import ru.ilb.workflow.mappers.ActivityInstanceMapper;
import ru.ilb.workflow.utils.JaxbHelper;
import ru.ilb.workflow.view.ActivityDossier;
import ru.ilb.workflow.view.ActivityForm;
import ru.ilb.workflow.view.ActivityInstance;

public class ActivityFormResourceImpl implements ActivityFormResource {

    private final static String EA_IS_WEBDAV_FOR_ACTIVITY_VISIBLE = "IS_WEBDAV_FOR_ACTIVITY_VISIBLE";

    private final static JsonMapObjectReaderWriter JSONREADERWRITER = new JsonMapObjectReaderWriter();

    private final Supplier<WMSessionHandle> sessionHandleSupplier;

    private final String processInstanceId;

    private final String activityInstanceId;

    @Autowired
    private JaxbHelper jaxbHelper;

    @Inject
    private ActivityInstanceMapper activityInstanceMapper;

    public ActivityFormResourceImpl(Supplier<WMSessionHandle> sessionHandleSupplier, String processInstanceId, String activityInstanceId) {
        this.sessionHandleSupplier = sessionHandleSupplier;
        this.processInstanceId = processInstanceId;
        this.activityInstanceId = activityInstanceId;
    }

    @Override
    @Transactional
    public Response getActivityForm() {
        try {
            return Response.ok(getActivityForm(sessionHandleSupplier.get(), processInstanceId, activityInstanceId)).build();
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    private String getActivityForm(WMSessionHandle shandle, String processInstanceId, String activityInstanceId) throws Exception {
        SharkConnection sc = Shark.getInstance().getSharkConnection();
        sc.attachToHandle(shandle);

        ActivityForm activityForm = new ActivityForm();
        WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
        WMActivityInstance wmActivityInstance = wapi.getActivityInstance(shandle, processInstanceId, activityInstanceId);
        ActivityInstance activityInstance = activityInstanceMapper.createFromEntity(wmActivityInstance);

        activityForm.setActivityInstance(activityInstance);

        activityForm.setActivityDossier(getActivityDossier(shandle, wmActivityInstance));
        activityForm.setProcessSteps(ProcessStepsResourceImpl.getProcessSteps(shandle, processInstanceId, null));

        JsonSchema jsonSchema = JsonSchemaResourceImpl.getJsonSchemaActivity(shandle, processInstanceId, activityInstanceId);
        String jsonSchemaStr = jaxbHelper.marshal(jsonSchema, "application/json");

        String activityFormStr = jaxbHelper.marshal(activityForm, "application/json");

        JsonMapObject jsonFormData = ProcessContextResourceImpl.getProcessContext(shandle, processInstanceId, activityInstanceId);
        String jsonFormDataStr = JSONREADERWRITER.toJson(jsonFormData);
        //activityInstance.setActivityDossier(getActivityDossier(shandle, wmActivityInstance));
        String output = activityFormStr.substring(0, activityFormStr.length()-1)
                + String.format(",\"jsonSchema\":%s,\"formData\":%s}", jsonSchemaStr, jsonFormDataStr);
        return output;

    }

    private static ActivityDossier getActivityDossier(WMSessionHandle shandle, WMActivityInstance wmActivityInstance) throws Exception {
        AdminMisc adminMisc = SharkInterfaceWrapper.getShark().getAdminMisc();
        WMEntity activityDefinition = adminMisc.getActivityDefinitionInfo(shandle, wmActivityInstance.getProcessInstanceId(), wmActivityInstance.getId());
        String webDavVisible = WMEntityUtilities.findEAAndGetValue(shandle, SharkInterfaceWrapper.getShark().getXPDLBrowser(), activityDefinition, EA_IS_WEBDAV_FOR_ACTIVITY_VISIBLE);
        ActivityDossier activityDossier = null;
        if ("true".equals(webDavVisible)) {
            activityDossier = new ActivityDossier();
            activityDossier.setDossierKey(wmActivityInstance.getProcessInstanceId());
            WMEntity processDefinition = adminMisc.getProcessDefinitionInfo(shandle, wmActivityInstance.getProcessInstanceId());

            activityDossier.setDossierPackage(processDefinition.getPkgId());
            activityDossier.setDossierCode(processDefinition.getId());
        }
        return activityDossier;
    }

}
