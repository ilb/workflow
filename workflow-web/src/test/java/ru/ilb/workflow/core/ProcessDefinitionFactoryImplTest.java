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
package ru.ilb.workflow.core;

import java.util.stream.Stream;
import javax.inject.Inject;
import org.junit.After;
import org.junit.AfterClass;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Test;
import static org.junit.Assert.*;
import org.junit.Ignore;
import org.junit.runner.RunWith;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.junit4.SpringRunner;
import ru.ilb.workflow.entities.ProcessDefinition;
import ru.ilb.workflow.entities.ProcessDefinitionFactory;

/**
 *
 * @author slavb
 */
//@SpringBootTest() //webEnvironment = SpringBootTest.WebEnvironment.RANDOM_PORT
//@RunWith(SpringRunner.class)
public class ProcessDefinitionFactoryImplTest {

    @Inject
    ProcessDefinitionFactory instance;

    public ProcessDefinitionFactoryImplTest() {
    }

    @BeforeClass
    public static void setUpClass() {
    }

    @AfterClass
    public static void tearDownClass() {
    }

    @Before
    public void setUp() {
    }

    @After
    public void tearDown() {
    }

    /**
     * Test of getProcessDefinitions method, of class ProcessDefinitionFactoryImpl.
     */
    @Test
    @Ignore
    public void testGetProcessDefinitions() {
        System.out.println("getProcessDefinitions");
        Boolean enabled = null;
        String packageId = "";
        String versionId = "";
        String processDefinitionId = "";
        Stream<ProcessDefinition> expResult = null;
        Stream<ProcessDefinition> result = instance.getProcessDefinitions(enabled, packageId, versionId, processDefinitionId);
        assertEquals(expResult, result);
    }

}
