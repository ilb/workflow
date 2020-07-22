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
package ru.ilb.workflow.context;

import java.util.HashMap;
import java.util.Map;
import java.util.function.Supplier;
import javax.inject.Named;
import ru.ilb.workflow.core.SessionData;
import ru.ilb.workflow.salepoint.SalepointProvider;

@Named
public class InitialProcessContextProviderImpl implements InitialProcessContextProvider {

    private final Supplier<SessionData> sessionHandleSupplier;

    private final SalepointProvider salepointProvider;

    public InitialProcessContextProviderImpl(Supplier<SessionData> sessionHandleSupplier, SalepointProvider salepointProvider) {
        this.sessionHandleSupplier = sessionHandleSupplier;
        this.salepointProvider = salepointProvider;
    }

    @Override
    public Map<String, Object> getContextData() {
             Map<String, Object> contextData = new HashMap<>();
        //TODO read context to process formal parameters!!!
        String salepointUid = salepointProvider.getSalepointUid(sessionHandleSupplier.get().getAuthorisedUser());
        contextData.put("salepointUid", salepointUid);
        // FIXME HARDCODE
        String organizationUid = salepointUid.startsWith("ru.bystrobank.sales.moscow") ? "8ca14c37-2080-49f4-~c-ab6841abad8c" : "2f27ec16-33d5-44e2-b939-22da11d1cee5";
        contextData.put("organizationUid", organizationUid);
        return contextData;
   }

}
