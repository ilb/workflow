/**
 * Copyright (C) 2015 Bystrobank, JSC
 *
 * This program is free software: you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or (at your option) any later
 * version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * this program. If not, see http://www.gnu.org/licenses
 */
package ru.ilb.workflow.xpil.web;

import at.together._2006.xpil1.PackageInstances;
import javax.servlet.http.HttpServletRequest;
import javax.ws.rs.Path;
import org.apache.cxf.jaxrs.ext.xml.XSLTTransform;
import org.enhydra.shark.api.client.wfmc.wapi.WAPI;
import org.enhydra.shark.api.client.wfmc.wapi.WMFilter;
import org.enhydra.shark.api.client.wfmc.wapi.WMProcessDefinitionState;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.common.ProcessMgrFilterBuilder;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.workflow.session.AuthorizationHandler;
import ru.ilb.workflow.xpil.api.PackagesResource;
import ru.ilb.workflow.xpil.utils.XPILJAXBUtils;

@Path("packages")
public class PackagesResourceImpl implements PackagesResource {

    private HttpServletRequest httpServletRequest;

    public void setHttpServletRequest(HttpServletRequest httpServletRequest) {
        this.httpServletRequest = httpServletRequest;
    }

    @XSLTTransform(value = "stylesheets/workflow/packages.xsl", mediaTypes = "application/xhtml+xml", type = XSLTTransform.TransformType.SERVER)
    @Override
    @Transactional
    public PackageInstances list() {
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            ProcessMgrFilterBuilder fb = SharkInterfaceWrapper.getShark()
                    .getProcessMgrFilterBuilder();
            WMFilter filter = fb.addIsEnabled(shandle);

            String res = SharkInterfaceWrapper.getShark()
                    .getXPILHandler()
                    .getProcessFactoryList(shandle, filter, null);
            PackageInstances packages = XPILJAXBUtils.fromStringPackageInstances(res);
            return packages;
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    public void deletePackage(String packageId, Boolean withProcesses) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    @Transactional
    public void disableProcessDefinition(String packageId, String processDefinitionId) {
        try {
            processDefinitionId = processDefinitionId.replace("^", "#");
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
            ProcessMgrFilterBuilder fb = SharkInterfaceWrapper.getShark()
                    .getProcessMgrFilterBuilder();

            wapi.changeProcessDefinitionState(shandle, processDefinitionId, WMProcessDefinitionState.DISABLED);

        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }

    }

}
