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
package ru.ilb.workflow.stub;

import java.util.Date;
import java.util.UUID;
import javax.inject.Named;
import javax.ws.rs.core.Response;
import ru.ilb.collection.api.CollectcasesResource;

/**
 *
 * @author slavb
 */
@Named
public class CollectcasesResourceMock implements CollectcasesResource {

    @Override
    public Response setNextActivityDate(UUID uid, Date nextActivityDate, Boolean forcibly) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public Response setLastActivityDate(UUID uid, Date lastActivityDate) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public Response setLastActivityCommentDate(UUID uid, Date lastActivityCommentDate) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

}
