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

import at.together._2006.xpil1.User;
import at.together._2006.xpil1.Users;
import java.util.List;
import java.util.stream.Collectors;
import java.util.stream.Stream;
import javax.annotation.Resource;
import javax.inject.Inject;
import javax.servlet.http.HttpServletRequest;
import javax.ws.rs.Path;
import javax.ws.rs.core.Context;
import org.enhydra.shark.api.admin.UserGroupManagerAdmin;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import org.springframework.stereotype.Component;
import org.springframework.transaction.annotation.Transactional;
import ru.ilb.workflow.session.AuthorizationHandler;
import ru.ilb.workflow.xpil.api.UsersResource;

@Component
@Path("users")
public class UsersResourceImpl implements UsersResource {

    private @Inject UsersResourceIntr usersResourceIntr;

    @Resource(mappedName = "autorizationKeySalt")
    private String autorizationKeySalt;

    private HttpServletRequest httpServletRequest;

    @Context
    public void setHttpServletRequest(HttpServletRequest httpServletRequest) {
        this.httpServletRequest = httpServletRequest;
    }

    @Override
    @Transactional
    public Users getUsers() {
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            UserGroupManagerAdmin userGroupAdmin = SharkInterfaceWrapper.getUserGroupAdmin();
            String[] allUsers = userGroupAdmin.getAllUsers(shandle);
            List<User> collect = Stream.of(allUsers).map(user -> usersResourceIntr.getUserInternal(shandle, userGroupAdmin, user)).collect(Collectors.toList());
            return new Users().withUsers(collect);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    @Override
    @Transactional
    public User getUser(String userUid) {
        try {
            WMSessionHandle shandle = SharkInterfaceWrapper.getSessionHandle(AuthorizationHandler.getAuthorisedUser(), null);
            UserGroupManagerAdmin userGroupAdmin = SharkInterfaceWrapper.getUserGroupAdmin();
            return usersResourceIntr.getUserInternal(shandle, userGroupAdmin, userUid);
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }


    @Override
    @Transactional
    public User getAuthorisedUser() {
        return getUser(getAuthorisedUserName());
    }

    @Override
    public String getAuthorisedUserName() {
        String userName = httpServletRequest.getRemoteUser();
        String xremoteUserName = httpServletRequest.getHeader("X-Remote-User");
        return xremoteUserName != null ? xremoteUserName : userName;
    }

}
