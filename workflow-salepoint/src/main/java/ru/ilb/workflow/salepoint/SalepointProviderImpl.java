/*
 * Copyright 2020 slavb.
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
package ru.ilb.workflow.salepoint;

import java.net.URI;
import java.util.Arrays;
import java.util.Collections;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.stream.Collectors;
import javax.inject.Named;
import javax.naming.NamingException;
import org.apache.commons.text.StringSubstitutor;
import ru.ilb.jfunction.map.converters.XmlToMapFunction;
import ru.ilb.uriaccessor.URIAccessor;
import ru.ilb.uriaccessor.URIAccessorFactory;

@Named
public class SalepointProviderImpl implements SalepointProvider {

    URIAccessorFactory uriAccessorFactory = new URIAccessorFactory();

    private final String serviceURITemplate;

    public SalepointProviderImpl(String serviceURITemplate) {
        this.serviceURITemplate = serviceURITemplate;
    }

    public SalepointProviderImpl() {
        this.serviceURITemplate = null;
    }

    private static String getLdapUri() {
        try {
            return (String) new javax.naming.InitialContext().lookup("ru.bystrobank.apps.ldapadminko.ws");
        } catch (NamingException ex) {
            throw new RuntimeException(ex);
        }
    }

    private URI getServiceURI(String authorisedUser) {
        String serviceURI = serviceURITemplate;
        if (serviceURI == null) {
            serviceURI = getLdapUri() + "/getSalepointByUser.php?uid-0=${uid}";
        }
        Map valuesMap = new HashMap();
        valuesMap.put("uid", authorisedUser);
        StringSubstitutor sub = new StringSubstitutor(valuesMap);
        return URI.create(sub.replace(serviceURI));
    }

    @Override
    public String getSalepointUid(String authorisedUser) {
        URIAccessor uriAccessor = uriAccessorFactory.getURIAccessor(getServiceURI(authorisedUser));
        byte[] content = uriAccessor.getContent();
        List<String> salepoints = getSalepoints(new String(content));
        return salepoints.stream().findFirst().orElse(null);
    }

    private List<String> getSalepoints(String xml) {
        Map<String, Object> apply = XmlToMapFunction.INSTANCE.apply(xml);
        Object salepointNode = apply.get("salepoint");
        if (!(salepointNode instanceof List)) {
            salepointNode = Arrays.asList(salepointNode);
        }
        List<Map<String, String>> salepointList = (List<Map<String, String>>) salepointNode;

        if (salepointList != null) {
            return salepointList.stream()
                    .filter(sp -> sp != null)
                    .map(sp -> sp.get("name")).collect(Collectors.toList());
        }
        return Collections.EMPTY_LIST;
    }

}
