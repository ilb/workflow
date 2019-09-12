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

import java.util.Arrays;
import javax.inject.Inject;
import javax.inject.Named;
import javax.ws.rs.Path;
import org.enhydra.shark.api.client.wfmc.wapi.WMProcessDefinition;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.springframework.context.ApplicationContext;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.workflow.api.ProcessDefinitionResource;
import ru.ilb.workflow.api.ProcessDefinitionsResource;
import ru.ilb.workflow.mappers.ProcessDefinitionMapper;
import ru.ilb.workflow.session.SessionDataProvider;
import ru.ilb.workflow.utils.ProcessDefinitionFilter;
import ru.ilb.workflow.utils.WAPIUtils;
import ru.ilb.workflow.view.ProcessDefinitions;

@Named
@Path("processDefinitions")
public class ProcessDefinitionsResourceImpl extends JaxRsContextResource implements ProcessDefinitionsResource {

    @Inject
    private SessionDataProvider sessionDataProvider;

    @Inject
    private ProcessDefinitionFilter processDefinitionFilter;

    @Inject
    private ProcessDefinitionMapper processDefinitionMapper;

    @Inject
    private ApplicationContext applicationContext;

    @Override
    public ProcessDefinitionResource getProcessDefinitionResource(String x_remote_user, String processDefinitionId) {
        ProcessDefinitionResourceImpl resource = new ProcessDefinitionResourceImpl(sessionDataProvider.getSessionData().getSessionHandleSupplier(), null, processDefinitionId);
        applicationContext.getAutowireCapableBeanFactory().autowireBean(resource);
        return resourceContext.initResource(resource);
    }

    @Override
    @Transactional
    public ProcessDefinitions getProcessDefinitions(String x_remote_user, Boolean enabled, String packageId, String versionId, String processDefinitionId) {
        try {
            WMSessionHandle shandle = sessionDataProvider.getSessionData().getSessionHandleSupplier().get();
            WMProcessDefinition[] wmProcessDefinitions = WAPIUtils.getProcessDefinitions(shandle, enabled, packageId, versionId, processDefinitionId);
            String userName = sessionDataProvider.getSessionData().getAuthorisedUser();
            wmProcessDefinitions = processDefinitionFilter.filterAccessible(wmProcessDefinitions, userName, shandle);
            return processDefinitionMapper.createWrapperFromEntities(Arrays.asList(wmProcessDefinitions));
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }

    }

}
