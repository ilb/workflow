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
package ru.ilb.workflow.utils;

import java.io.IOException;
import javax.ws.rs.core.HttpHeaders;
import javax.ws.rs.core.MediaType;
import org.apache.cxf.jaxrs.ext.MessageContext;

/**
 *
 * @author slavb
 */
public class HTTPUtils {

    /**
     * Check if client is browser (true) or ajax (false)
     *
     * @param httpHeaders
     * @return
     */
    public static boolean isBrowser(HttpHeaders httpHeaders) {
        return httpHeaders.getAcceptableMediaTypes().stream().anyMatch(mt -> mt.isCompatible(MediaType.APPLICATION_XHTML_XML_TYPE));
    }

    /**
     * Get Location header name for browser / ajax
     *
     * @param httpHeaders
     * @return
     */
    public static String getLocaltionHeaderName(HttpHeaders httpHeaders) {
        return isBrowser(httpHeaders) ? "Location" : "X-Location";
    }

    public static void redirect(MessageContext messageContext, String uri) throws IOException {
        if (isBrowser(messageContext.getHttpHeaders())) {
            messageContext.getHttpServletResponse().sendRedirect(uri);
        } else {
            messageContext.getHttpServletResponse().addHeader("X-Location", uri);
        }

    }

}
