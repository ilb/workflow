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

import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;
import java.net.URI;
import java.net.URISyntaxException;
import java.util.Iterator;
import java.util.Map;
import java.util.Properties;
import java.util.StringTokenizer;
import javax.naming.Context;
import javax.naming.InitialContext;
import javax.transaction.UserTransaction;
import org.enhydra.shark.admin.repositorymanagement.RepositoryManager;
import org.enhydra.shark.api.admin.RepositoryMgr;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;
import org.enhydra.shark.utilities.misc.MiscUtilities;
import org.enhydra.shark.utilities.quartz.QuartzInitializer;
import org.enhydra.shark.webclient.business.prof.graph.SnapshotImageCreator;
import org.quartz.Scheduler;
import org.quartz.SchedulerException;
import org.slf4j.LoggerFactory;

/**
 *
 * @author slavb
 */
public class EngineUtils {

    private static final org.slf4j.Logger LOG = LoggerFactory.getLogger(EngineUtils.class);

    public static void stopEngine() {
        Scheduler scheduler = QuartzInitializer.getScheduler();
        if (scheduler != null) {
            try {
                scheduler.shutdown();
            } catch (SchedulerException ex) {
                LOG.error("scheduler.shutdown", ex);
            }
        }
        SharkInterfaceWrapper.shutdown();
        //The web application appears to have started a thread named [Abandoned connection cleanup thread] but has failed to stop it. This is very likely to create a memory leak
        /*try {
         Class<?> cls = Class.forName("com.mysql.jdbc.AbandonedConnectionCleanupThread");
         Method mth = (cls == null ? null : cls.getMethod("shutdown"));
         if (mth != null) {
         mth.invoke(null);
         logger.info("MySQL connection cleanup thread shutdown successful");
         }
         } catch (Throwable ex) {
         logger.warn("Failed to shutdown SQL connection cleanup thread: " + ex.getMessage());
         }*/

    }

    public static void setLDAPProperties(Properties p) {
        try {
            if (System.getProperty(Context.PROVIDER_URL) != null && System.getProperty(Context.PROVIDER_URL).startsWith("ldap")) {
                StringTokenizer st = new StringTokenizer(System.getProperty(Context.PROVIDER_URL));
                // TODO берем только первый урл. как сделать раунд-робин серверов?
                if (st.hasMoreTokens()) {
                    URI lurl = new URI(st.nextToken());
                    p.setProperty("LDAPHost", lurl.getHost());
                    p.setProperty("LDAPPort", "" + ((lurl.getPort() != -1) ? lurl.getPort() : (lurl.getScheme().equals("ldaps") ? 636 : 389)));
                    p.setProperty("LDAPProtocol", lurl.getScheme());
                    p.setProperty("LDAPSearchBase", "" + lurl.getPath().substring(1)); //отрезаем лидирующий слеш-разделитель - он в путь попадает
                }
            }
        } catch (URISyntaxException ex) {
            throw new RuntimeException(ex);
        }
    }

    public static void setRealPath(Properties p, String contextPath) {
        for (Iterator it = p.keySet().iterator(); it.hasNext();) {
            String key = (String) it.next();
            String value = p.getProperty(key);
            if (0 <= value.indexOf("@@")) {
                String newValue = MiscUtilities.replaceAll(value, "@@/", contextPath);
                newValue = newValue.replace('\\', '/');
                p.setProperty(key, newValue);
                LOG.debug("key is: " + key + ", old value is: " + value + ", new value is: " + newValue);
            }
        }
    }

    public static void setQuartzProperties(Properties p, String contextPath) {
        String quartzConf = p.getProperty("SharkKernel.Quartz.confPath");
        Properties quartzProps = new Properties();
        if (quartzConf != null) {
            File cfgFile = new File(quartzConf);
            if (!cfgFile.isAbsolute()) {
                cfgFile = cfgFile.getAbsoluteFile();
            }
            if (cfgFile.exists()) {
                try (FileInputStream fis = new FileInputStream(quartzConf)) {
                    quartzProps.load(fis);
                } catch (IOException ex) {
                    throw new RuntimeException(ex);
                }
            }
        }
        setRealPath(quartzProps, contextPath);
        Iterator it = quartzProps.entrySet().iterator();
        while (it.hasNext()) {
            Map.Entry<String, String> me = (Map.Entry<String, String>) it.next();
            p.setProperty(me.getKey(), me.getValue());
        }
    }

    public static void setSharkProperties(String contextPath) {
        Properties properties = new Properties();
        String confPath = contextPath + "conf/Shark.conf";
        try (FileInputStream fis = new FileInputStream(confPath)) {
            properties.load(fis);
        } catch (IOException ex) {
            throw new RuntimeException("Cannot open " + confPath, ex);
        }
        setLDAPProperties(properties);
        setRealPath(properties, contextPath);
        setQuartzProperties(properties, contextPath);
//        try {
//            SharkInterfaceWrapper.setProperties(properties, true);
//        } catch (Exception ex) {
//            throw new RuntimeException(ex);
//        }
        UserTransaction ut = null;
        try {
            ut = getUserTransaction();
            ut.begin();
            SharkInterfaceWrapper.setProperties(properties, false);
            ut.commit();
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        } finally {
            DBUtils.rollback(ut);
        }
    }

    public static UserTransaction getUserTransaction() {
        try {
//             return SharkInterfaceWrapper.getUserTransaction();
            javax.naming.Context ctx = new InitialContext();
            return (UserTransaction) ctx.lookup("java:comp/env/UserTransaction");
        } catch (Exception ex) {
            throw new RuntimeException(ex);
        }
    }

    public static void setXpdlRepository(String XPDLRepositoryPath) {

        if (XPDLRepositoryPath != null) {
            /*try {
                Files.createSymbolicLink(Paths.get(contextPath, "xpdlrepository"), Paths.get(XPDLRepositoryPath));
            } catch (FileAlreadyExistsException ex) {
                logger.info("not creating symlink to xpdlrepository: exists");
            } catch (UnsupportedOperationException | IOException ex) {
                logger.error("cannot create symlink ", ex);
            }*/
            UserTransaction ut = null;
            try {
                ut = SharkInterfaceWrapper.getUserTransaction();
                ut.begin();
                RepositoryMgr repMgr = RepositoryManager.getInstance();
                repMgr.setPathToXPDLRepositoryFolder(XPDLRepositoryPath + "/packages");
                ut.commit();
            } catch (Exception ex) {
                LOG.error("Cannot setPathToXPDLRepositoryFolder ", ex);
            } finally {
                DBUtils.rollback(ut);
            }
        }
    }

    public static void setSnapshotImageCreator() {
        Properties props = new Properties();
        props.put("graph_activity_running_color", "R=255,G=255,B=128");
        props.put("graph_activity_finished_color", "R=255,G=128,B=128");
        props.put("graph_activity_pending_color", "R=128,G=255,B=128");
        props.put("graph_activity_nonexecuted_color", "R=255,G=255,B=255");
        UserTransaction ut = null;
        try {
            ut = SharkInterfaceWrapper.getUserTransaction();
            ut.begin();
            SnapshotImageCreator.init(null, props);
            ut.commit();
        } catch (Exception ex) {
            LOG.error("Problems while setting up SnapshotImageCreator!", ex);
        } finally {
            DBUtils.rollback(ut);
        }
    }
}
