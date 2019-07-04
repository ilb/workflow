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
package ru.ilb.workflow.toolagent.objectconverter;

import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.util.HashMap;
import java.util.Map;
import org.enhydra.jxpdl.XPDLConstants;
import org.enhydra.shark.api.internal.toolagent.AppParameter;
import ru.ilb.jsonschema.utils.JsonTypeMapper;

/**
 *
 * @author slavb
 */
public abstract class MapObjectConverter implements ObjectConverter {

    /**
     * Сериализация данных в выходной поток
     * @param map
     * @param os
     * @throws java.io.IOException
     */
    protected abstract void marshall(Map<String, Object> map, OutputStream os) throws IOException;
    /**
     * Десериализация входных данных из потока
     * @param is
     * @return
     * @throws IOException
     */
    protected abstract Map<String, Object> unmarshall(InputStream is) throws IOException;
    /**
     * Десериализация входных данных из строки
     * @param s
     * @return
     */
    protected abstract Map<String, Object> unmarshall(String s);

    @Override
    public void marshall(AppParameter[] parameters, OutputStream os)  throws IOException {
        Map<String, Object> map = parametersMap(parameters);
        marshall(map, os);
    }

    @Override
    public void unmarshall(AppParameter[] parameters, InputStream is) throws IOException {
        Map<String, Object> map = MapObjectConverter.this.unmarshall(is);
        mapToParameters(parameters, map);
    }

    @Override
    public void unmarshall(AppParameter[] parameters, String s) {
        Map<String, Object> map = unmarshall(s);
        mapToParameters(parameters, map);
    }

    /**
     * Convert parameters to JSON structure
     *
     * @param parameters
     * @return
     */
    private Map<String, Object> parametersMap(AppParameter[] parameters) {
        Map<String, Object> map = new HashMap();
        if (parameters != null) {
            // ignore 1. param, this is ext. attribs.
            for (int i = 1; i < parameters.length; i++) {
                if (parameters[i].the_mode.equals(XPDLConstants.FORMAL_PARAMETER_MODE_IN) || parameters[i].the_mode.equals(XPDLConstants.FORMAL_PARAMETER_MODE_INOUT)) {
                    // get type from parameter, since it may differ from actual value type
                    String value = JsonTypeMapper.toString(parameters[i].the_value, parameters[i].the_class);
                    map.put(parameters[i].the_formal_name, value);
                }
            }
        }
        return map;
    }

    /**
     * Convert JSON structure to parameters
     *
     * @param parameters
     * @param jmo
     */
    private void mapToParameters(AppParameter[] parameters, Map<String, Object> jmo) {
        
        if (parameters != null) {
            // ignore 1. param, this is ext. attribs.
            for (int i = 1; i < parameters.length; i++) {
                if (parameters[i].the_mode.equals(XPDLConstants.FORMAL_PARAMETER_MODE_OUT) || parameters[i].the_mode.equals(XPDLConstants.FORMAL_PARAMETER_MODE_INOUT)) {
                    parameters[i].the_value = JsonTypeMapper.toObject(jmo.get(parameters[i].the_formal_name), parameters[i].the_class);
                }
            }
        }
    }

}
