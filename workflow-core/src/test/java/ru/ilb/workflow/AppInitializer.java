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
package ru.ilb.workflow;

import com.atomikos.icatch.jta.UserTransactionManager;
import javax.annotation.PostConstruct;
import javax.inject.Inject;
import javax.inject.Named;
import javax.naming.NamingException;
import javax.sql.DataSource;
import org.springframework.mock.jndi.SimpleNamingContextBuilder;
import ru.ilb.workflow.core.ProcessDefinitionFactoryImplTest;
import ru.ilb.workflow.utils.EngineUtils;

/**
 *
 * @author slavb
 */
@Named
public class AppInitializer {

    @Inject
    DataSource dataSource;

    @Inject
    UserTransactionManager tm;

    private void initJndi() {
        try {
            SimpleNamingContextBuilder builder = new SimpleNamingContextBuilder();

//            Reference userTransaction = new Reference("javax.transaction.UserTransaction", "org.enhydra.jndi.UserTransactionFactory", null);
            //UserTransactionManager tm = new UserTransactionManager();
            //tm.setForceShutdown(true);
            builder.bind("java:comp/env/UserTransaction", tm);
//            builder.bind("javax.transaction.TransactionManager", tm);
            builder.bind("java:comp/env/jdbc/sharkdb", dataSource);
            builder.activate();
        } catch (IllegalStateException | NamingException ex) {
            throw new RuntimeException(ex);
        }

    }

    private void initShark() {
        String contextPath = ProcessDefinitionFactoryImplTest.class.getClassLoader().getResource("shark").toString().substring(5) + "/";
        EngineUtils.setSharkProperties(contextPath);
        EngineUtils.setXpdlRepository(contextPath + "xpdlrepository");
        EngineUtils.setSnapshotImageCreator();

    }

    @PostConstruct
    public void init() {
        initJndi();
        initShark();
    }

}
