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
import java.nio.charset.StandardCharsets;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Map;
import org.apache.cxf.jaxrs.json.basic.JsonMapObject;
import org.apache.cxf.jaxrs.json.basic.JsonMapObjectReaderWriter;
import org.enhydra.jxpdl.XPDLConstants;
import org.enhydra.shark.api.internal.toolagent.AppParameter;
import ru.ilb.workflow.utils.IOUtils;

/**
 *
 * @author slavb
 */
public class JsonMapObjectConverter extends MapObjectConverter {

    private final JsonMapObjectReaderWriter jsonreaderwriter = new JsonMapObjectReaderWriter();

    @Override
    protected void marshall(Map<String, Object> map, OutputStream os) {
        jsonreaderwriter.toJson(new JsonMapObject(map), os);
    }

    @Override
    protected Map<String, Object> unmarshall(InputStream is) throws IOException {
        return jsonreaderwriter.fromJsonToJsonObject(is).asMap();
    }

    @Override
    protected Map<String, Object> unmarshall(String s) {
        return jsonreaderwriter.fromJsonToJsonObject(s).asMap();
    }

}
