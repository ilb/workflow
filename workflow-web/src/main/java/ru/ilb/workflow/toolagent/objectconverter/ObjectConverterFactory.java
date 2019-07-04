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

import java.util.HashMap;
import java.util.Map;

/**
 *
 * @author slavb
 */
public class ObjectConverterFactory {

    private final static Map<String,ObjectConverter> CONVERTERS = new HashMap<>();

    static {
        CONVERTERS.put("application/xml", new XmlObjectConverter());
        CONVERTERS.put("application/json", new JsonMapObjectConverter());

    }

    public ObjectConverter getObjectConverter(String representation) {
        return CONVERTERS.get(representation);
    }

}
