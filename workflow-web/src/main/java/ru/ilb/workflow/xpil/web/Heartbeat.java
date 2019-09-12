/*
 * Copyright 2017 muratov_tr.
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

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import javax.annotation.Resource;
import javax.sql.DataSource;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import org.springframework.transaction.annotation.Transactional;

/**
 *
 * @author muratov_tr
 */
@Path("heartbeat")
public class Heartbeat {

    @Resource(mappedName = "jdbc/sharkdb")
    private DataSource ds;

    @GET
    @Transactional
    public String heartbeat() {
        try (Connection connection = ds.getConnection()) {
        } catch (SQLException ex) {
            throw new RuntimeException(ex);
        }
        return "OK";
    }
}
