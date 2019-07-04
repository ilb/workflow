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

import java.io.ByteArrayInputStream;
import java.io.ByteArrayOutputStream;
import java.io.InputStream;
import java.util.LinkedHashMap;
import java.util.Map;
import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author slavb
 */
public class XmlObjectConverterTest {

    String xml = "<root><date>2019-05-23</date><active>true</active><fairPrice>1012.1</fairPrice></root>";
    String xml2 = "<root><active>False</active><fairPrice>0</fairPrice><countDays>1</countDays><countDeals>3</countDeals><tradingVolume>0.01</tradingVolume><initialVolume>500000000</initialVolume><date>2019-05-24</date></root>";
    Map<String, Object> map = new LinkedHashMap<>();

    public XmlObjectConverterTest() {
        map.put("active", Boolean.TRUE);
        map.put("fairPrice", 1012.1);
        map.put("date", "2019-05-23");
    }

    /**
     * Test of marshall method, of class XmlObjectConverter.
     */
    @Test
    public void testMarshall() throws Exception {
        System.out.println("mapToOutputStream");
        ByteArrayOutputStream os = new ByteArrayOutputStream();
        XmlObjectConverter instance = new XmlObjectConverter();
        instance.marshall(map, os);
        assertEquals(xml, os.toString());
    }

    /**
     * Test of unmarshall method, of class XmlObjectConverter.
     *
     * @throws java.lang.Exception
     */
    @Test
    public void testUnmarshall() throws Exception {
        System.out.println("inputStreamToMap");

        InputStream is = new ByteArrayInputStream(xml.getBytes());

        XmlObjectConverter instance = new XmlObjectConverter();

        Map<String, Object> result = instance.unmarshall(is);
        assertEquals(map, result);

        is = new ByteArrayInputStream(xml2.getBytes());
        result = instance.unmarshall(is);
        assertNotNull(result);
    }

}
