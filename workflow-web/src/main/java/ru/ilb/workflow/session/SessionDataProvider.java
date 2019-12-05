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
package ru.ilb.workflow.session;

import java.io.IOException;
import java.util.function.Supplier;
import javax.inject.Named;
import javax.ws.rs.container.ContainerRequestContext;
import javax.ws.rs.container.ContainerRequestFilter;
import javax.ws.rs.container.PreMatching;
import javax.ws.rs.core.MultivaluedMap;
import javax.ws.rs.ext.Provider;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;

/**
 *
 * @author slavb
 */
@Provider
@Named
@PreMatching
public class SessionDataProvider implements ContainerRequestFilter, Supplier<WMSessionHandle> { // ContextProvider<SessionData>

    private final ThreadLocal<SessionData> sessionData = new ThreadLocal<>();

    @Override
    public void filter(ContainerRequestContext requestContext) throws IOException {
        SessionData sd = new SessionData();
        sessionData.set(sd);

        String userName = requestContext.getSecurityContext().getUserPrincipal().getName();
        String xremoteUserName = requestContext.getHeaderString("X-Remote-User");
        MultivaluedMap<String, String> queryParams = requestContext.getUriInfo().getQueryParameters();
        if (xremoteUserName == null) {
            xremoteUserName = queryParams.getFirst("x-remote-user");
        }
        sd.setAuthorisedUser(xremoteUserName != null ? xremoteUserName : userName);
    }

    public SessionData getSessionData() {
        return sessionData.get();
    }

//    @Override
//    public SessionData getContext(Class<?> type) {
//        return sessionData.get();
//    }
//    @Override
//    public SessionData createContext(Message message) {
//        return sessionData.get();
//    }
    @Override
    public WMSessionHandle get() {
        return getSessionData().getSessionHandle();
    }
}
