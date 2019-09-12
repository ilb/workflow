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
package ru.ilb.workflow.session;

import java.io.IOException;
import javax.annotation.Resource;
import javax.ws.rs.container.ContainerRequestContext;
import javax.ws.rs.container.ContainerRequestFilter;
import javax.ws.rs.core.MultivaluedMap;
import javax.ws.rs.ext.Provider;
import static org.apache.commons.codec.digest.DigestUtils.sha1Hex;
import org.apache.cxf.interceptor.security.AccessDeniedException;
import org.slf4j.LoggerFactory;

/**
 *
 * @author slavb
 */
@Provider
public class AuthorizationHandler implements ContainerRequestFilter {

    @Resource(mappedName = "autorizationKeySalt")
    private String autorizationKeySalt;

    private static final org.slf4j.Logger logger = LoggerFactory.getLogger(AuthorizationHandler.class);

    private static final ThreadLocal authorisedUser = new ThreadLocal();

    @Override
    public void filter(ContainerRequestContext requestContext) throws IOException {
        String userName = requestContext.getSecurityContext().getUserPrincipal().getName();
        String xremoteUserName = requestContext.getHeaderString("X-Remote-User");
        String xforwardedproto = requestContext.getHeaderString("X-Forwarded-Proto");
        MultivaluedMap<String, String> queryParams = requestContext.getUriInfo().getQueryParameters();
        if (xremoteUserName == null) {
            xremoteUserName = queryParams.getFirst("x-remote-user");
        }
        //TODO ограничить X-Remote-User
        if (xremoteUserName != null) {
            //если проброс через http проверяем ключ
            if ("http".equals(xforwardedproto)) {
                if (queryParams.getFirst("x-remote-user-key") == null) {
                    throw new AccessDeniedException("Access denied! x-remote-user not allowed without x-remote-user-key");
                } else {
                    String calcKey = sha1Hex(xremoteUserName + autorizationKeySalt);
                    String remoteKey = queryParams.getFirst("x-remote-user-key");
                    if (!remoteKey.equals(calcKey)) {
                        throw new AccessDeniedException("Access denied! Incorrect x-remote-user-key = " + remoteKey);
                    }
                }
            }
        }
        authorisedUser.set(xremoteUserName != null ? xremoteUserName : userName);
    }

    public static String getAuthorisedUser() {
        return (String) authorisedUser.get();
    }

}
