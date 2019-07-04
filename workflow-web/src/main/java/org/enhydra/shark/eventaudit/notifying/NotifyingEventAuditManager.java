/**
 * Together Workflow Server
 * Copyright (C) 2011 Together Teamsolutions Co., Ltd.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see http://www.gnu.org/licenses
 */

package org.enhydra.shark.eventaudit.notifying;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.HashSet;
import java.util.Iterator;
import java.util.List;
import java.util.Map;
import java.util.Set;

import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.internal.eventaudit.AssignmentEventAuditPersistenceObject;
import org.enhydra.shark.api.internal.eventaudit.CreateProcessEventAuditPersistenceObject;
import org.enhydra.shark.api.internal.eventaudit.DataEventAuditPersistenceObject;
import org.enhydra.shark.api.internal.eventaudit.DeleteProcessEventAuditPersistenceObject;
import org.enhydra.shark.api.internal.eventaudit.EventAuditException;
import org.enhydra.shark.api.internal.eventaudit.EventAuditManagerInterface;
import org.enhydra.shark.api.internal.eventaudit.EventAuditPersistenceInterface;
import org.enhydra.shark.api.internal.eventaudit.PropertiesEventAuditPersistenceObject;
import org.enhydra.shark.api.internal.eventaudit.StateEventAuditPersistenceObject;
import org.enhydra.shark.api.internal.working.CallbackUtilities;

/**
 * TODO: document
 *
 * @author <a href="daniel.frey@xmatrix.ch">Daniel Frey </a>
 * @version 0.2
 */
public class NotifyingEventAuditManager implements EventAuditManagerInterface {
   public static final EventType DATA_EVENT_TYPE = new EventType(DataEventAuditPersistenceObject.class);

   public static final EventType ASSIGNMENT_EVENT_TYPE = new EventType(AssignmentEventAuditPersistenceObject.class);

   public static final EventType STATE_EVENT_TYPE = new EventType(StateEventAuditPersistenceObject.class);

   public static final EventType CREATION_EVENT_TYPE = new EventType(CreateProcessEventAuditPersistenceObject.class);

   public static final EventType PROPERTIES_EVENT_TYPE = new EventType(PropertiesEventAuditPersistenceObject.class);

   public static final EventType DELETION_EVENT_TYPE = new EventType(DeleteProcessEventAuditPersistenceObject.class);

   // private static final Logger LOGGER =
   // Logger.getLogger(NotifyingEventAuditManager.class);
   // private static final boolean DEBUG = LOGGER.isDebugEnabled();
   private static final Map listeners = new HashMap();

   private static CallbackUtilities cus;

   private static boolean DEBUG;

   public void configure(CallbackUtilities _cus) throws Exception {
      cus = _cus;
      DEBUG = Boolean.valueOf(cus.getProperty("NotifyingEventAuditManager.Debug", "false")).booleanValue();
   }

   public void refreshCaches(WMSessionHandle shandle) throws Exception {
   }

   public void persist(WMSessionHandle shandle, AssignmentEventAuditPersistenceObject aea) throws EventAuditException {
      fire(shandle,aea, ASSIGNMENT_EVENT_TYPE);
   }

   public void persist(WMSessionHandle shandle, DataEventAuditPersistenceObject dea) throws EventAuditException {
      fire(shandle,dea, DATA_EVENT_TYPE);
   }

   public void persist(WMSessionHandle shandle, StateEventAuditPersistenceObject sea) throws EventAuditException {
      fire(shandle,sea, STATE_EVENT_TYPE);
   }

   public void persist(WMSessionHandle shandle, CreateProcessEventAuditPersistenceObject cpea) throws EventAuditException {
      fire(shandle,cpea, CREATION_EVENT_TYPE);
   }

   public void persist(WMSessionHandle shandle, PropertiesEventAuditPersistenceObject pea) throws EventAuditException {
      fire(shandle,pea, PROPERTIES_EVENT_TYPE);

   }

   public void persist(WMSessionHandle shandle, DeleteProcessEventAuditPersistenceObject pea) throws EventAuditException {
      fire(shandle,pea, PROPERTIES_EVENT_TYPE);

   }

   public boolean restore(WMSessionHandle shandle, AssignmentEventAuditPersistenceObject aea) throws EventAuditException {
      fire(shandle,aea, ASSIGNMENT_EVENT_TYPE);
      return false;
   }

   public boolean restore(WMSessionHandle shandle, DataEventAuditPersistenceObject dea) throws EventAuditException {
      fire(shandle,dea, DATA_EVENT_TYPE);
      return false;
   }

   public boolean restore(WMSessionHandle shandle, StateEventAuditPersistenceObject sea) throws EventAuditException {
      fire(shandle,sea, STATE_EVENT_TYPE);
      return false;
   }

   public boolean restore(WMSessionHandle shandle, CreateProcessEventAuditPersistenceObject cpea) throws EventAuditException {
      fire(shandle,cpea, CREATION_EVENT_TYPE);
      return false;
   }

   public boolean restore(WMSessionHandle shandle, PropertiesEventAuditPersistenceObject pea) throws EventAuditException {
      fire(shandle,pea, PROPERTIES_EVENT_TYPE);
      return false;
   }

   public boolean restore(WMSessionHandle shandle, DeleteProcessEventAuditPersistenceObject pea) throws EventAuditException {
      fire(shandle,pea, DELETION_EVENT_TYPE);
      return false;
   }

   public List restoreProcessHistory(WMSessionHandle shandle, String procId) throws EventAuditException {
      return new ArrayList();
   }

   public List restoreActivityHistory(WMSessionHandle shandle, String procId, String actId) throws EventAuditException {
      return new ArrayList();
   }

   public void delete(WMSessionHandle shandle, AssignmentEventAuditPersistenceObject aea) throws EventAuditException {
      fire(shandle,aea, ASSIGNMENT_EVENT_TYPE);
   }

   public void delete(WMSessionHandle shandle, DataEventAuditPersistenceObject dea) throws EventAuditException {
      fire(shandle,dea, DATA_EVENT_TYPE);
   }

   public void delete(WMSessionHandle shandle, StateEventAuditPersistenceObject sea) throws EventAuditException {
      fire(shandle,sea, STATE_EVENT_TYPE);
   }

   public void delete(WMSessionHandle shandle, CreateProcessEventAuditPersistenceObject cpea) throws EventAuditException {
      fire(shandle,cpea, CREATION_EVENT_TYPE);
   }

   public void delete(WMSessionHandle shandle, PropertiesEventAuditPersistenceObject pea) throws EventAuditException {
      fire(shandle,pea, DELETION_EVENT_TYPE);

   }

   public void deleteAllEventsForClosedProcessInstances(WMSessionHandle shandle,
                                                        String sqlWhere,
                                                        int maxExceptions,
                                                        int preferredTime,
                                                        int waitingTime,
                                                        int minBatchSize) throws EventAuditException {
   }

   public int deleteAllEventsForClosedProcessInstance(WMSessionHandle shandle, String procId) throws EventAuditException {
      return 0;
   }

   private static void fire(WMSessionHandle shandle, EventAuditPersistenceInterface persister, EventType type) {
      synchronized (listeners) {
         if (DEBUG) {
            cus.debug(null,
                      "firing event for "
                            + (type == null ? "all types " : "type \"" + type + "\"")
                            + (persister.getActivityId() == null ? "" : ", activity \"" + persister.getActivityId() + "\"")
                            + (persister.getProcessId() == null ? "" : ", instance \"" + persister.getProcessId() + "\"")
                            + (persister.getProcessDefinitionId() == null ? "" : ", process \"" + persister.getProcessDefinitionId() + "\"")
                            + (persister.getPackageId() == null ? "" : ", package \"" + persister.getPackageId() + "\""));
         }
         final Set listenerset = new HashSet();
         listenerset.addAll(collectListeners((Map) listeners.get(null), persister));
         listenerset.addAll(collectListeners((Map) listeners.get(type), persister));
         listenerset.remove(null);
         for (final Iterator iterator = listenerset.iterator(); iterator.hasNext();) {
            final EventAuditListener listener = (EventAuditListener) iterator.next();
            final EventAuditEvent event = new EventAuditEvent(NotifyingEventAuditManager.class);
            event.setPersister(persister);
            listener.eventAuditChanged(shandle, event);
         }
      }
   }

   private static Set collectListeners(final Map allTypes, EventAuditPersistenceInterface persister) {
      List list;
      final Set listenerset = new HashSet();
      if (allTypes != null) {
         list = (List) allTypes.get(null);
         if (list != null) {
            listenerset.addAll(list);
         }
         list = (List) allTypes.get(persister.getPackageId());
         if (list != null) {
            listenerset.addAll(list);
         }
         list = (List) allTypes.get(persister.getActivityId());
         if (list != null) {
            listenerset.addAll(list);
         }
         list = (List) allTypes.get(persister.getProcessId());
         if (list != null) {
            listenerset.addAll(list);
         }
         list = (List) allTypes.get(persister.getProcessDefinitionId());
         if (list != null) {
            listenerset.addAll(list);
         }
      }
      return listenerset;
   }

   public static void addEventAuditListener(final EventAuditListener listener) {
      addEventAuditListener(listener, null);
   }

   public static void addEventAuditListener(final EventAuditListener listener, final EventType type) {
      addEventAuditListener(listener, type, null);
   }

   public static void addEventAuditListener(final EventAuditListener listener, final EventType type, final String id) {
      Map hash = (Map) listeners.get(type);
      if (hash == null) {
         hash = new HashMap();
         listeners.put(type, hash);
      }
      List list = (List) hash.get(id);
      if (list == null) {
         list = new ArrayList();
         hash.put(id, list);
      }
      list.add(listener);
   }

   public static void removeEventAuditListener(final EventAuditListener listener) {
      removeEventAuditListener(listener, null, null);
   }

   public static void removeEventAuditListener(final EventAuditListener listener, final EventType type) {
      removeEventAuditListener(listener, type, null);
   }

   public static void removeEventAuditListener(final EventAuditListener listener, final EventType type, final String id) {
      final Map hash = (Map) listeners.get(type);
      if (hash == null) {
         return;
      }
      final List list = (List) hash.get(id);
      if (list == null) {
         return;
      }
      list.remove(listener);
   }

   private static class EventType {
      private String name;

      private EventType(Class type) {
         final String full = type.getName();
         name = full.substring(full.lastIndexOf('.') + 1);
      }

      public String toString() {
         return name;
      }
   }

   public List listProcessHistoryInfoWhere(WMSessionHandle shandle,
                                           String sqlWhere,
                                           int startAt,
                                           int limit,
                                           boolean fillActivitiesInfo,
                                           short[] activityEventTypesToQuery,
                                           short[] processEventTypesToQuery) throws EventAuditException {
      return new ArrayList();
   }

   public List listActivityHistoryInfoWhere(WMSessionHandle shandle, String sqlWhere, int startAt, int limit, short[] activityEventTypesToQuery)
      throws EventAuditException {
      return new ArrayList();
   }

   public List listProcessDefinitionHistoryInfoWhere(WMSessionHandle shandle, String factoryName, boolean countProcessInstances) throws EventAuditException {
      return new ArrayList();
   }

}
