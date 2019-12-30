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
import javax.naming.InitialContext;
import javax.naming.NamingException;
import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.AfterAll;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.BeforeAll;
import org.junit.jupiter.api.Test;
import static org.junit.jupiter.api.Assertions.*;
import org.junit.jupiter.api.Disabled;
import ru.ilb.jndicontext.core.JNDIInitialContextFactory;
import ru.ilb.workflow.entities.ProcessDefinition;
import ru.ilb.workflow.utils.EngineUtils;

/**
 *
 * @author slavb
 */
public class ProcessDefinitionFactoryImplTest {

    public ProcessDefinitionFactoryImplTest() {
    }

    @BeforeAll
    public static void setUpClass() {
    }

    private static void setupShark() {
        System.setProperty("java.naming.factory.initial", JNDIInitialContextFactory.class.getName());
        String contextPath = ProcessDefinitionFactoryImplTest.class.getClassLoader().getResource("shark").toString().substring(5)+"/";
        EngineUtils.setSharkProperties(contextPath);
        EngineUtils.setXpdlRepository(contextPath+"xpdlrepository");
        EngineUtils.setSnapshotImageCreator();

    }

    @AfterAll
    public static void tearDownClass() {
    }

    @BeforeEach
    public void setUp() {
    }

    @AfterEach
    public void tearDown() {
    }

    /**
     * Test of getProcessDefinitions method, of class ProcessDefinitionFactoryImpl.
     */
//    @Test
//    public void testGetProcessDefinitions() {
//        System.out.println("getProcessDefinitions");
//        setupShark();
//        Boolean enabled = null;
//        String packageId = "";
//        String versionId = "";
//        String processDefinitionId = "simpletest";
//        ProcessDefinitionFactoryImpl instance = new ProcessDefinitionFactoryImpl(() -> new SessionDataImpl(System.getProperty("user.name"), new SessionHandleFunction()));
//        Stream<ProcessDefinition> expResult = null;
//        Stream<ProcessDefinition> result = instance.getProcessDefinitions(enabled, packageId, versionId, processDefinitionId);
//        assertEquals(expResult, result);
//    }

}
