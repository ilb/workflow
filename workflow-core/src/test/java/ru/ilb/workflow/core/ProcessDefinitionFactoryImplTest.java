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
import org.junit.jupiter.api.AfterAll;
import org.junit.jupiter.api.AfterEach;
import static org.junit.jupiter.api.Assertions.*;
import org.junit.jupiter.api.BeforeAll;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import org.junit.jupiter.api.extension.ExtendWith;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.junit.jupiter.SpringExtension;
import org.springframework.transaction.PlatformTransactionManager;
import org.springframework.transaction.support.TransactionTemplate;
import ru.ilb.workflow.entities.ProcessDefinition;
import ru.ilb.workflow.entities.ProcessDefinitionFactory;

/**
 *
 * @author slavb
 */
@ExtendWith(SpringExtension.class)
@SpringBootTest // webEnvironment = SpringBootTest.WebEnvironment.RANDOM_PORT
public class ProcessDefinitionFactoryImplTest {

    @Inject
    ProcessDefinitionFactory instance;

    @Inject
    private PlatformTransactionManager transactionManager;

    public ProcessDefinitionFactoryImplTest() {
    }

    @BeforeAll
    public static void setUpClass() {
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
    @Test
    public void testGetProcessDefinitions() {
        System.out.println("getProcessDefinitions");
        //setupShark();
        Boolean enabled = null;
        String packageId = null;
        String versionId = null;
        String processDefinitionId = "simpletest";
        //ProcessDefinitionFactoryImpl instance = new ProcessDefinitionFactoryImpl(() -> new SessionDataImpl(System.getProperty("user.name"), new SessionHandleFunction()));
        String expResult = "simpletest";
        TransactionTemplate transactionTemplate = new TransactionTemplate(transactionManager);
        Stream<ProcessDefinition> result = transactionTemplate.execute(status
                -> instance.getProcessDefinitions(enabled, packageId, versionId, processDefinitionId));
        assertEquals(expResult, result.findFirst().get().getId());
    }

}
