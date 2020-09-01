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
package ru.ilb.workflow.xpil.web;

import at.together._2006.xpil1.User;
import javax.inject.Named;
import org.enhydra.shark.api.admin.UserGroupManagerAdmin;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.springframework.cache.annotation.Cacheable;

/**
 *
 * @author slavb
 */
@Named
public class UsersResourceIntr {

    /**
     * TODO move to core.UserRepository
     *
     * @param shandle
     * @param userGroupAdmin
     * @param userUid
     * @return
     */
    @Cacheable
    public User getUserInternal(WMSessionHandle shandle, UserGroupManagerAdmin userGroupAdmin, String userUid) {
        try {
            User user = new User();
            user.setId(userUid);
            // тормозит, переделать на ldap
            //user.setName(userGroupAdmin.getUserRealName(shandle, userUid));
            return user;
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }

    }
}
