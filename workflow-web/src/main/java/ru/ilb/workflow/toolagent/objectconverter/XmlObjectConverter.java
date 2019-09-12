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
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.util.Map;
import org.apache.cxf.jaxrs.json.basic.JsonMapObject;
import org.apache.cxf.jaxrs.json.basic.JsonMapObjectReaderWriter;
import org.json.JSONObject;
import org.json.XML;

public class XmlObjectConverter extends MapObjectConverter {

    private final JsonMapObjectReaderWriter jsonreaderwriter = new JsonMapObjectReaderWriter();

    @Override
    protected void marshall(Map<String, Object> map, OutputStream os) throws IOException {
        String str = jsonreaderwriter.toJson(new JsonMapObject(map));
        JSONObject json = new JSONObject(str);
        String xml = XML.toString(json, "root");
        os.write(xml.getBytes());
    }

    @Override
    protected Map<String, Object> unmarshall(InputStream is) throws IOException {

        JSONObject xmlJSONObj = XML.toJSONObject(new InputStreamReader(is));

        return (Map<String, Object>) xmlJSONObj.toMap().values().iterator().next();
    }

    @Override
    protected Map<String, Object> unmarshall(String s) {
        JSONObject xmlJSONObj = XML.toJSONObject(s);
        return (Map<String, Object>) xmlJSONObj.toMap().values().iterator().next();
    }

}
