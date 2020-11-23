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

import com.github.benmanes.caffeine.cache.Caffeine;
import java.net.URI;
import java.nio.file.Paths;
import java.util.concurrent.TimeUnit;
import javax.naming.InitialContext;
import javax.naming.NamingException;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.cache.CacheManager;
import org.springframework.cache.annotation.EnableCaching;
import org.springframework.cache.caffeine.CaffeineCacheManager;
import org.springframework.context.annotation.AdviceMode;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.ImportResource;
import org.springframework.data.jdbc.repository.config.EnableJdbcRepositories;
import org.springframework.transaction.annotation.EnableTransactionManagement;
import org.springframework.validation.beanvalidation.LocalValidatorFactoryBean;
import ru.ilb.filedossier.context.DossierContextBuilder;
import ru.ilb.filedossier.context.DossierContextImpl;
import ru.ilb.filedossier.ddl.DossierDefinitionRepository;
import ru.ilb.filedossier.ddl.FileDossierDefinitionRepository;
import ru.ilb.filedossier.entities.DossierContext;
import ru.ilb.filedossier.store.StoreFactory;
import ru.ilb.scripting.evaluator.SubstitutorTemplateEvaluator;
import ru.ilb.scripting.evaluator.TemplateEvaluator;

/**
 *
 * @author slavb
 */
@SpringBootApplication
@EnableJdbcRepositories(basePackages = "ru.ilb.filedossier.context.persistence.repositories")
@ImportResource("classpath:beans.xml")
@EnableTransactionManagement(mode=AdviceMode.ASPECTJ)
@EnableCaching(mode = AdviceMode.ASPECTJ)
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
	@Bean
	public Caffeine caffeineConfig() {
	    return Caffeine.newBuilder().expireAfterWrite(5, TimeUnit.MINUTES);
	}
	@Bean
	public CacheManager cacheManager(Caffeine caffeine) {
	    CaffeineCacheManager caffeineCacheManager = new CaffeineCacheManager();
	    caffeineCacheManager.setCaffeine(caffeine);
	    return caffeineCacheManager;
	}
//    @Bean
//    public ContainersResource containersResource(){
//        return new ContainersResourceImpl();
//    }
// only works with auto-registered cxf jax-rs server
//    @Bean
//    public LoggingFeature loggingFeature() {
//        LoggingFeature lf = new LoggingFeature();
//        lf.addBinaryContentMediaTypes("application/vnd.oasis.opendocument.spreadsheet");
//        return lf;
//    }
}
