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

import java.util.ArrayList;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;
import java.util.function.Supplier;
import javax.annotation.Resource;
import javax.naming.NamingException;
import javax.ws.rs.core.Response;
import org.enhydra.jxpdl.elements.WorkflowProcess;
import org.enhydra.shark.Shark;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.client.wfmodel.WfActivity;
import org.enhydra.shark.api.client.wfmodel.WfProcess;
import org.enhydra.shark.api.client.wfservice.SharkConnection;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.jsonschema.jsonschema.JsonSchema;
import ru.ilb.jsonschema.jsonschema.JsonType;
import ru.ilb.jsonschema.jsonschema.Property;
import ru.ilb.jsonschema.utils.JsonTypeConverter;
import ru.ilb.workflow.api.JsonSchemaResource;
import ru.ilb.workflow.core.SessionData;
import ru.ilb.workflow.utils.XPDLUtils;

public class JsonSchemaResourceImpl implements JsonSchemaResource {

    @Resource(mappedName = "apps.workflow.jsonschema.property.string.pattern")
    private String stringPattern;

    @Resource(mappedName = "apps.workflow.jsonschema.property.string.patternDesc")
    private String stringPatternDesc;

    @Resource(mappedName = "apps.workflow.jsonschema.property.string.minLength")
    private Integer stringMinLength;

    private final Supplier<SessionData> sessionHandleSupplier;

    private final String processInstanceId;

    private final String activityInstanceId;

    public JsonSchemaResourceImpl(Supplier<SessionData> sessionHandleSupplier, String processInstanceId, String activityInstanceId) {
        this.sessionHandleSupplier = sessionHandleSupplier;
        this.processInstanceId = processInstanceId;
        this.activityInstanceId = activityInstanceId;
    }

    @Override
    @Transactional
    public Response getJsonSchema() {
        try {
            WMSessionHandle shandle = sessionHandleSupplier.get().getSessionHandle();
            return Response.ok(getJsonSchemaActivity(shandle, processInstanceId, activityInstanceId)).build();
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    public static JsonSchema getJsonSchemaActivity(WMSessionHandle shandle, String processInstanceId, String activityInstanceId) throws Exception {
        SharkConnection sc = Shark.getInstance().getSharkConnection();
        sc.attachToHandle(shandle);

        JsonSchema jsonSchema = getJsonSchemaProcess(shandle, sc, processInstanceId);
        if (activityInstanceId != null) {
            WfActivity activityInstance = sc.getActivity(processInstanceId, activityInstanceId);
            jsonSchema.setTitle(activityInstance.name());
            jsonSchema.setDescription(activityInstance.description());
            filterActivityVariables(shandle, jsonSchema, processInstanceId, activityInstanceId);
        }
        return jsonSchema;
    }

    private static void filterActivityVariables(WMSessionHandle shandle, JsonSchema jsonSchema, String processInstanceId, String activityInstanceId) throws Exception {

        Map<String, Boolean> activityVariables = XPDLUtils.getActivityVariables(shandle, processInstanceId, activityInstanceId);
        List<String> required = new ArrayList<>();
        LinkedHashMap<String, Property> activityProperties = new LinkedHashMap();
        activityVariables.entrySet().forEach(av -> {
            Property property = jsonSchema.getProperty(av.getKey());
            if (av.getValue()) {
                property.setReadOnly(true);
//                Uniforms uniforms = new Uniforms();
//                uniforms.setDisabled(true);
//                property.setUniforms(uniforms);
            } else {
                //TODO: refactor to entitites
                switch (property.getType()) {
                    case STRING:
                        property.setMinLength(lookupInteger("apps.workflow.jsonschema.property.string.minLength"));
                        property.setPattern(lookupString("apps.workflow.jsonschema.property.string.pattern"));
                        property.setPatternDesc(lookupString("apps.workflow.jsonschema.property.string.patternDesc"));
                }
                //property.setPattern(processInstanceId);
                required.add(av.getKey());
            }
            activityProperties.put(av.getKey(), property);
        });
        jsonSchema.setProperties(activityProperties);
        jsonSchema.setRequired(required);
    }

    private static String lookupString(String name) {
        try {
            return ((String) new javax.naming.InitialContext().lookup(name));
        } catch (NamingException ex) {
            throw new RuntimeException(ex);
        }
    }

    private static Integer lookupInteger(String name) {
        try {
            return ((Integer) new javax.naming.InitialContext().lookup(name));
        } catch (NamingException ex) {
            throw new RuntimeException(ex);
        }
    }

    private static JsonSchema getJsonSchemaProcess(WMSessionHandle shandle, SharkConnection sc, String processInstanceId) throws Exception {

        WorkflowProcess workflowProcess = XPDLUtils.getWorkflowProcess(shandle, processInstanceId, null);
        Map<String, String> dataFields = XPDLUtils.getDataFields(workflowProcess);

        WfProcess processInstance = sc.getProcess(processInstanceId);

        Map<String, String> contextSignature = processInstance.manager().context_signature();

        JsonSchema jsonSchema = new JsonSchema();
        jsonSchema.setTitle(processInstance.name());
        jsonSchema.setDescription(processInstance.description());
        jsonSchema.setType(JsonType.OBJECT);
        for (Map.Entry<String, String> df : dataFields.entrySet()) {
            Property property = new Property();
            property.setName(df.getKey());
            property.setTitle(df.getValue());
            String javaType = contextSignature.get(df.getKey());
            if (javaType != null) {
                property.setType(JsonTypeConverter.getJsonType(javaType));
                property.setFormat(JsonTypeConverter.getJsonFormat(javaType));
            }
            jsonSchema.addProperty(property);
        }

        return jsonSchema;

//        WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
        //WfActivity activityInstance2 = sc.getActivity(processId, activityId);
//        WMActivityInstance activityInstance = wapi.getActivityInstance(shandle, processId, activityId);
//
//        WMAttributeIterator listActivityInstanceAttributes = wapi.listActivityInstanceAttributes(shandle, processId, activityId, null, false);
//        WMAttribute[] attrs = listActivityInstanceAttributes.getArray();
//        if (attrs.length > 0) {
//
//        }
//
//
        //WorkflowProcess workflowProcess = XPDLUtils.getWorkflowProcess(shandle, processId, null);
        //Map vars = workflowProcess.getAllVariables();
        //activityInstance.name();
        //workflowProcess.getActivity();
    }

}
