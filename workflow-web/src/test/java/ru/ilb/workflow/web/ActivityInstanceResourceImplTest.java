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

import static junit.framework.Assert.assertEquals;
import org.junit.Test;
import ru.ilb.workflow.utils.PosixRealm;

/**
 *
 * @author slavb
 */
//@SpringBootTest(webEnvironment = WebEnvironment.RANDOM_PORT)
//@ContextConfiguration(classes=TestApplication.class​)
//@RunWith(SpringRunner.class)
public class ActivityInstanceResourceImplTest {

    public ActivityInstanceResourceImplTest() {
    }

    /**
     * Test of getActivityInstance method, of class ActivityInstanceResourceImpl.
     */
    @Test
    public void testGetActivityInstance() {
    }

    @Test
    public void testPosixRealm() {
        String user = "a888";
        String result = PosixRealm.getFioByUser(user);
        assertEquals("Фамилия Имя Отчество_Оглы_Иванович", result);
    }

    /**
     * Test of getJsonSchemaResource method, of class ActivityInstanceResourceImpl.
     */
//    @Test
//    public void testGetJsonSchemaResource() {
//        System.out.println("getJsonSchemaResource");
//        ActivityInstanceResourceImpl instance = null;
//        JsonSchemaResource expResult = null;
//        JsonSchemaResource result = instance.getJsonSchemaResource();
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    /**
//     * Test of getActivityFormResource method, of class ActivityInstanceResourceImpl.
//     */
//    @Test
//    public void testGetActivityFormResource() {
//        System.out.println("getActivityFormResource");
//        ActivityInstanceResourceImpl instance = null;
//        ActivityFormResource expResult = null;
//        ActivityFormResource result = instance.getActivityFormResource();
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    /**
//     * Test of getProcessContextResource method, of class ActivityInstanceResourceImpl.
//     */
//    @Test
//    public void testGetProcessContextResource() {
//        System.out.println("getProcessContextResource");
//        ActivityInstanceResourceImpl instance = null;
//        ProcessContextResource expResult = null;
//        ProcessContextResource result = instance.getProcessContextResource();
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    /**
//     * Test of completeActivity method, of class ActivityInstanceResourceImpl.
//     */
//    @Test
//    public void testCompleteActivity() {
//        System.out.println("completeActivity");
//        JsonMapObject jsonmapobject = null;
//        ActivityInstanceResourceImpl instance = null;
//        boolean expResult = false;
//        boolean result = instance.completeActivity(jsonmapobject);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    /**
//     * Test of completeAndNextActivity method, of class ActivityInstanceResourceImpl.
//     */
//    @Test
//    public void testCompleteAndNextActivity() {
//        System.out.println("completeAndNextActivity");
//        JsonMapObject jsonmapobject = null;
//        ActivityInstanceResourceImpl instance = null;
//        ActivityInstance expResult = null;
//        ActivityInstance result = instance.completeAndNextActivity(jsonmapobject);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
//
//    /**
//     * Test of goBackActivity method, of class ActivityInstanceResourceImpl.
//     */
//    @Test
//    public void testGoBackActivity() {
//        System.out.println("goBackActivity");
//        JsonMapObject jsonmapobject = null;
//        ActivityInstanceResourceImpl instance = null;
//        ActivityInstance expResult = null;
//        ActivityInstance result = instance.goBackActivity(jsonmapobject);
//        assertEquals(expResult, result);
//        // TODO review the generated test code and remove the default call to fail.
//        fail("The test case is a prototype.");
//    }
}
