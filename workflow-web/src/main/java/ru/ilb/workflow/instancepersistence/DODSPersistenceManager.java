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
package ru.ilb.workflow.instancepersistence;

import com.lutris.appserver.server.sql.CoreDO;
import com.lutris.dods.builder.generator.query.QueryBuilder;
import java.math.BigDecimal;
import java.util.ArrayList;
import java.util.List;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.internal.instancepersistence.PersistenceException;
import org.enhydra.shark.instancepersistence.dods.data.ProcessDO;
import org.enhydra.shark.instancepersistence.dods.data.ProcessQuery;
import org.enhydra.shark.instancepersistence.dodsselective.DODSSelectivePersistenceManager;

/**
 *
 * @author slavb
 */
public class DODSPersistenceManager extends DODSSelectivePersistenceManager{

    @Override
   public List getAllIdsForProcessesWithExpiriedDeadlines(WMSessionHandle shandle, long timeLimitBoundary) throws PersistenceException {
      long tStamp = cus.methodStart(shandle, "DODSPersistentManager.getAllIdsForProcessesWithExpiriedDeadlines()");
      initActivityAndProcessStatesTable();
      try {
         List ret = new ArrayList();

         BigDecimal procOpenRunningState = (BigDecimal) _prStates.get("open.running");
         BigDecimal actNotStartedState = (BigDecimal) _acStates.get("open.not_running.not_started");
         BigDecimal actRunningState = (BigDecimal) _acStates.get("open.running");
         String oidCol = CoreDO.get_OIdColumnName();
         String sqlWherePS = "SHKProcesses.State=" + procOpenRunningState;
         String sqlWhereDL = "SHKProcesses."
                             + oidCol + " IN (SELECT SHKDeadlines.Process FROM SHKDeadlines "
                             + " JOIN SHKActivities on SHKActivities."+oidCol+"=SHKDeadlines.Activity"
                             + " WHERE SHKDeadlines.TimeLimit < " + timeLimitBoundary
                             + " AND (SHKActivities.State=" + actNotStartedState + " OR SHKActivities.State=" + actRunningState + "))";
         ProcessDO[] DOs = null;
         ProcessQuery query = null;
         query = new ProcessQuery();
         QueryBuilder qb = query.getQueryBuilder();
         qb.addWhere(sqlWherePS);
         qb.addWhere(sqlWhereDL);
         DOs = query.getDOArray();
         if (DOs != null) {
            for (int i = 0; i < DOs.length; i++) {
               ret.add(DOs[i].getId());
            }
         }
         return ret;
      } catch (Throwable t) {
         throw new PersistenceException(t);
      } finally {
         cus.methodEnd(shandle,
                       tStamp,
                       "DODSPersistentManager.getAllIdsForProcessesWithExpiriedDeadlines()",
                       "[timeLimitBoundary=" + timeLimitBoundary + "]",
                       "TimeProfiler-InstancePersistence");
      }
   }    
    
}
