/*
 * Copyright 2018 slavb.
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

import com.sun.java.xml.ns.javaee.EnvEntryType;
import com.sun.java.xml.ns.javaee.ResourceEnvRefType;
import com.sun.java.xml.ns.javaee.ResourceRefType;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.naming.NamingException;
import javax.sql.DataSource;
import org.springframework.jdbc.datasource.DriverManagerDataSource;
import org.springframework.mock.jndi.SimpleNamingContextBuilder;
import org.springframework.stereotype.Component;
import ru.ilb.common.test.Jndi;

/**
 *
 * @author slavb
 */
public class JndiMock extends Jndi {

//    @Autowired
//    private DataSource dataSource;
//
//
//    @Autowired
//    private TestConfiguration testConfiguration;
    public JndiMock() {
        addExcludeName("jdbc/loancalculator");
        try {
            SimpleNamingContextBuilder builder = new SimpleNamingContextBuilder();
            getParams().forEach((name, value) -> {
                builder.bind(name, value);
            });
            //builder.bind("jdbc/loancalculator", dataSource);
            builder.activate();
        } catch (IllegalStateException | NamingException ex) {
            Logger.getLogger(JndiMock.class.getName()).log(Level.SEVERE, null, ex);
        }

    }

    @Override
    protected Object getEnvEntryValue(EnvEntryType envEntryType) {
        switch (envEntryType.getEnvEntryName().getValue()) {
            case "importRNBSourceEnabled":
                return Boolean.TRUE;
            default:
                return super.getEnvEntryValue(envEntryType);
        }
    }

    @Override
    protected Object getResourceRefValue(ResourceRefType resourceRefType) {
        return icsDataSource();
    }

    @Override
    protected Object getResourceEnvRefValue(ResourceEnvRefType resourceEnvRefType) {
        switch (resourceEnvRefType.getResourceEnvRefName().getValue()) {
            case "ru.bystrobank.apps.meta.url":
                return "https://devel.net.ilb.ru/meta/";
            default:
                return super.getResourceEnvRefValue(resourceEnvRefType);
        }
    }

    private DataSource icsDataSource() {
        DriverManagerDataSource dataSource = new DriverManagerDataSource();
        return dataSource;
//        dataSource.setDriverClassName(env.getProperty("jdbc.driverClassName"));
//        dataSource.setUrl(env.getProperty("jdbc.url"));
//        dataSource.setUsername(env.getProperty("jdbc.user"));
//        dataSource.setPassword(env.getProperty("jdbc.pass"));

    }

}
