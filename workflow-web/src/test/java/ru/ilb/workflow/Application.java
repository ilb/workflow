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

import java.net.URI;
import java.nio.file.Paths;
import javax.naming.InitialContext;
import javax.naming.NamingException;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.context.annotation.Bean;
import org.springframework.validation.beanvalidation.LocalValidatorFactoryBean;
import ru.ilb.callcontext.core.CallContextFactoryImpl;
import ru.ilb.callcontext.core.ContextParserImpl;
import ru.ilb.callcontext.core.ContextReaderImpl;
import ru.ilb.callcontext.entities.CallContextFactory;
import ru.ilb.common.jaxrs.jaxb.JaxbContextResolver;
import ru.ilb.filedossier.context.DossierContextBuilder;
import ru.ilb.filedossier.context.DossierContextImpl;
import ru.ilb.filedossier.ddl.DossierDefinitionRepository;
import ru.ilb.filedossier.ddl.FileDossierDefinitionRepository;
import ru.ilb.filedossier.entities.DossierContext;
import ru.ilb.scripting.evaluator.SubstitutorTemplateEvaluator;
import ru.ilb.scripting.evaluator.TemplateEvaluator;
import ru.ilb.filedossier.store.StoreFactory;

/**
 *
 * @author slavb
 */
//@SpringBootApplication
//@EnableJdbcRepositories(basePackages = "ru.ilb.filedossier.context.persistence.repositories")
public class Application {

    //@Resource(mappedName = "ru.bystrobank.apps.workflow.processfilesbase")
    @Value("${ru.bystrobank.apps.workflow.processfilesbase}")
    String processfilesbase;

    //@Resource(mappedName = "xpdlRepository")
    @Value("${xpdlRepository}")
    String xpdlRepository;

//    @Bean
//    public Context context() throws NamingException {
//        final Context context = new InitialContext();
//        context.bind("ru.bystrobank.apps.meta.url", "https://devel.net.ilb.ru/meta");
//        return context;
//    }
    @Bean
    public CallContextFactory callContextFactory() {
        return new CallContextFactoryImpl(new ContextReaderImpl(), new ContextParserImpl());
    }

    @Bean
    public JaxbContextResolver jaxbContextResolver() {
        return new JaxbContextResolver();
    }

    @Bean
    public TemplateEvaluator templateEvaluator() throws NamingException {
        return new SubstitutorTemplateEvaluator(new InitialContext());
    }

    @Bean
    public DossierContextBuilder dossierContextBuilder() {
        DossierContextBuilder dossierContextBuilder = (String dossierKey, String dossierPackage, String dossierCode) -> {
            DossierContext dc = new DossierContextImpl();
            dc.setProperty("name", "Тест имя");
            dc.setProperty("prop", false);
            return dc;
        };
        return dossierContextBuilder;
    }

    @Bean
    public StoreFactory storeFactory() {
        return StoreFactory.newInstance(URI.create(processfilesbase));
    }

    @Bean
    public DossierDefinitionRepository dossierDefinitionRepository() {
        return new FileDossierDefinitionRepository(Paths.get(xpdlRepository).resolve("packages").toUri());
    }

    @Bean
    public javax.validation.Validator localValidatorFactoryBean() {
        return new LocalValidatorFactoryBean();
    }

// only works with auto-registered cxf jax-rs server
//    @Bean
//    public LoggingFeature loggingFeature() {
//        LoggingFeature lf = new LoggingFeature();
//        lf.addBinaryContentMediaTypes("application/vnd.oasis.opendocument.spreadsheet");
//        return lf;
//    }
}
