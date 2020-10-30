/*
 * Copyright 2016 slavb.
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
package ru.ilb.workflow.web;

import java.util.HashMap;
import javax.annotation.Resource;
import javax.inject.Named;
import javax.sql.DataSource;
import javax.ws.rs.Path;
import org.springframework.jdbc.core.namedparam.MapSqlParameterSource;
import org.springframework.jdbc.core.namedparam.NamedParameterJdbcTemplate;
import ru.ilb.workflow.api.ProcessHistoriesResource;
import ru.ilb.workflow.workflow.ChangedProcessesRequest;
import ru.ilb.workflow.workflow.ChangedProcessesResponse;

@Named
@Path("processhistories")
public class ProcessHistoriesResourceImpl implements ProcessHistoriesResource {

    private NamedParameterJdbcTemplate npjt;

    @Resource(mappedName = "jdbc/sharkdb")
    public void setJT(DataSource datasource) {
        this.npjt = new NamedParameterJdbcTemplate(datasource);
    }

    @Override
    public ChangedProcessesResponse getChangedProcesses(ChangedProcessesRequest changedprocessesrequest) {
        ChangedProcessesResponse res = new ChangedProcessesResponse();
        res.setVersionFrom(changedprocessesrequest.getVersionFrom());
        res.setVersionTo(changedprocessesrequest.getVersionTo());
        if (res.getVersionTo() == null) {
            res.setVersionTo(npjt.queryForObject("select max(cnt) from SHKProcessHistoryDetails", new HashMap(), Integer.class));
        }
        if (res.getVersionFrom() == null) {
            res.setVersionFrom(res.getVersionTo());
        }
        if (res.getVersionTo() > res.getVersionFrom()) {
            String sql = "SELECT  distinct phd.processId  FROM SHKProcessHistoryDetails phd";
            if (!changedprocessesrequest.getDefinitionIds().isEmpty()) {
                sql += "\n join SHKProcessHistoryInfo phi on phi.oid=phd.ProcessHistoryInfo and phi.ProcessDefinitionId in (:processDefinitionId)"; //FIXME
            }
            sql += "\nwhere phd.CNT between :versionFrom and  :versionTo";
            MapSqlParameterSource paramMap = new MapSqlParameterSource();
            if (!changedprocessesrequest.getDefinitionIds().isEmpty()) {
                paramMap.addValue("processDefinitionId", changedprocessesrequest.getDefinitionIds());
            }
            paramMap.addValue("versionFrom", res.getVersionFrom());
            paramMap.addValue("versionTo", res.getVersionTo());
            res.setProcessIds(npjt.queryForList(sql, paramMap, String.class));
        }
        return res;
    }

}
