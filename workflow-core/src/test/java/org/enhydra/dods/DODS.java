/*
 * Together Relational Objects
 * Copyright (C) 2011 Together Teamsolutions Co., Ltd.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see http://www.gnu.org/licenses
 */
 /*
 * Enhydra Java Application Server Project
 *
 * The contents of this file are subject to the Enhydra Public License
 * Version 1.1 (the "License"); you may not use this file except in
 * compliance with the License. You may obtain a copy of the License on
 * the Enhydra web site ( http://www.enhydra.org/ ).
 *
 * Software distributed under the License is distributed on an "AS IS"
 * basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See
 * the License for the specific terms governing rights and limitations
 * under the License.
 *
 * The Initial Developer of the Enhydra Application Server is Lutris
 * Technologies, Inc. The Enhydra Application Server and portions created
 * by Lutris Technologies, Inc. are Copyright Lutris Technologies, Inc.
 * All Rights Reserved.
 */

 /*
 *
 * @author    Nenad Vico
 * @author    Tanja Jovanovic
 * @version   1.0.0  2003/03/16
 *
 */
package org.enhydra.dods;

import java.io.*;
import java.lang.reflect.Constructor;
import java.net.URL;
import java.sql.SQLException;
import java.util.*;

import javax.naming.Context;
import javax.naming.InitialContext;

import com.lutris.appserver.server.sql.*;
import com.lutris.logging.*;
import com.lutris.util.*;

/**
 * Main DODS class. There are two modes of usage: non-threading and
 * threading. In non-threading mode, only one DatabaseManager is used
 * for the whole application, no matter the application has one or more
 * Threads. In threading mode, there is one DatabaseManager for every
 * Thread. User needs, for every Thread, to define the DatabaseManager.
 * If, for any Thread, the DatabaseManager is not defined, the default
 * DatabaseManager is used.
 * <p>
 * Example for non-threading mode: <blockquote>
 *
 * <pre>
 *   ...
 *   try {
 *  String fileName = &quot;discRack.conf&quot;;
 *       DatabaseManager dbManager = StandardDatabaseManager.newInstance(fileName);
 *       DODS.register(dbManager);
 *   } catch (Exception e) {
 *       e.printStackTrace();
 *   }
 *   ...
 * </pre>
 *
 * </blockquote>
 */
public class DODS {

    /**
     * This attribute is used for storing <code>DatabaseManager</code>s,
     * if threading mode is used. Every <code>Thread</code> has
     * precisely one <code>DatabaseManager</code>. If
     * <code>Thread</code> doesn't have <code>DatabaseManager</code>,
     * it uses <code>defaultDatabaseManager</code>.
     */
    private static Map databaseManagers;

    /**
     * This attribute is used for storing default
     * <code>DatabaseManager</code>. In non-treading mode, there is
     * only one <code>DatabaseManager</code>, and this
     * <code>DatabaseManager</code> is set as
     * <code>defaultDatabaseManager</code>.
     */
    private static DatabaseManager defaultDatabaseManager;

    /**
     * This attribute is used for storing <code>LogChannel</code>s,
     * if threading mode is used. Every <code>Thread</code> has
     * precisely one <code>LogChannel</code>. If <code>Thread</code>
     * doesn't have <code>LogChannel</code>, it uses
     * <code>defaultLogger</code>.
     */
    private static Map logChannels;

    /**
     * This attribute is used for storing default
     * <code>LogChannel</code>. <code>defaultLogger</code> is
     * initialized with the root <code>LogChannel</code>. It is
     * assumed that user sets root <code>LogChannel</code> in log4j
     * configuration. Otherwise, logging is set to OFF.
     */
    private static LogChannel defaultLogChannel;

    /**
     * Mode of usage. If this flag is <code>true</code>, DODS uses
     * multi threading mode. This means that DODS handles multiple
     * threads, like Enhydra application server (each application in one
     * <code>Thread</code>). If this flag is <code>false</code>,
     * there can be more then one <code>Thread</code>, but there is
     * only one <code>DatabaseManager</code> for all
     * <code>Thread</code>s (for the whole application).
     */
    private static boolean threading;

    private static boolean dodsConfigured;

    static {
        init();
    }

    /**
     * Sets the default DatabaseManager.
     *
     * @param databaseManager the DatabaseManager to be set as default.
     */
    public static void registerDefault(DatabaseManager databaseManager) {
        defaultDatabaseManager = databaseManager;
        setDodsConfigured(true);
    }

    /**
     * Sets the default DatabaseManager.
     *
     * @param fileName full path name of the application configuration
     * file.
     */
    public static void registerDefault(String fileName) throws ConfigException,
            DatabaseManagerException,
            SQLException {
        defaultDatabaseManager = StandardDatabaseManager.newInstance(fileName);
        setDodsConfigured(true);
    }

    /**
     * In threading mode, this method associates the DatabaseManager
     * object with the current thread. If default DatabaseManager is
     * <code>null</code>, it will also be set. In non-threading mode,
     * only default DatabaseManager will be set.
     *
     * @param databaseManager the DatabaseManager to associate with
     * current thread.
     */
    public static void register(DatabaseManager databaseManager) {
        if (threading) {
            databaseManagers.put(Thread.currentThread(), databaseManager);
            if (defaultDatabaseManager == null) {
                defaultDatabaseManager = databaseManager;
            }
            setDodsConfigured(true);
            return;
        }
        defaultDatabaseManager = databaseManager;
        setDodsConfigured(true);
    }

    /**
     * In threading mode, this method associates the DatabaseManager
     * object with the current thread. If default DatabaseManager is
     * <code>null</code>, it will also be set. In non-threading mode,
     * only default DatabaseManager will be set.
     *
     * @param fileName full path name of the application configuration
     * file which will create <code>DatabaseManager</code>associate
     * with current thread.
     */
    public static void startup(String fileName) throws ConfigException,
            DatabaseManagerException,
            SQLException {

        LogChannel channel = null;
        Config cfgSection = null;
        try {
            cfgSection = readConfig(null, fileName);
            channel = getLogChannel(cfgSection);
        } catch (Exception ex) {
            ex.printStackTrace();
            throw new ConfigException("Unable to invoke Logging Class defined in : "
                    + fileName);
        }
        defaultLogChannel = channel;

        DatabaseManager databaseManager = new StandardDatabaseManager(cfgSection);

        if (threading) {
            databaseManagers.put(Thread.currentThread(), databaseManager);
            logChannels.put(Thread.currentThread(), channel);
            if (defaultDatabaseManager == null) {
                defaultDatabaseManager = databaseManager;
            }
            defaultLogChannel = channel;
            setDodsConfigured(true);
            return;
        }
        defaultDatabaseManager = databaseManager;
        ((StandardDatabaseManager) databaseManager).initCaches(databaseManager.getClass()
                .getClassLoader());
        setDodsConfigured(true);
    }

    private static Config readConfig(URL object, String fileName) throws Exception {
        File f = new File(fileName);
        InputStream configIS = null;
        if (f.exists()) {
            configIS = new FileInputStream(f);
        } else {
            configIS = Common.getConfFileFromURL(null, fileName);
        }
        ConfigFile configFile = new ConfigFile(configIS);
        Config config = configFile.getConfig();
        configIS.close();

        return (Config) config.getSection("DatabaseManager");
    }

    /**
     * In threading mode, this method associates the DatabaseManager
     * object with the current thread. If default DatabaseManager is
     * <code>null</code>, it will also be set. In non-threading mode,
     * only default DatabaseManager will be set.
     *
     * @param confURL Additional path to folder or *.jar file with
     * configuration file. If null use DODS classpath.
     * @param confFile Name of conf file relativ to *.jar file or to
     * specifide folder (from confURL/DODS claspath).
     */
    public static void startup(URL confURL, String confFile) throws ConfigException,
            DatabaseManagerException,
            SQLException {

        LogChannel channel = null;
        Config cfgSection = null;
        try {
            cfgSection = readConfig(confURL, confFile);
            channel = getLogChannel(cfgSection);
        } catch (Exception ex) {
            throw new ConfigException("Unable to invoke Logging Class defined in : "
                    + confFile);
        }
        defaultLogChannel = channel;

        DatabaseManager databaseManager = new StandardDatabaseManager(cfgSection);
        if (threading) {
            databaseManagers.put(Thread.currentThread(), databaseManager);
            logChannels.put(Thread.currentThread(), channel);
            if (defaultDatabaseManager == null) {
                defaultDatabaseManager = databaseManager;
            }
            defaultLogChannel = channel;
            setDodsConfigured(true);
            return;
        }
        defaultDatabaseManager = databaseManager;
        ((StandardDatabaseManager) databaseManager).initCaches(databaseManager.getClass()
                .getClassLoader());
        setDodsConfigured(true);
    }

    /**
     * Associates DatabaseManager created by the given fileName with
     * given thread. If default DatabaseManager is null, the default
     * DatabaseManager will also be set.
     *
     * @param thread the thread to associate with
     * <code>DatabaseManager</code>.
     * @param fileName full path name of the application configuration
     * file which will create <code>DatabaseManager</code>associate
     * with given thread.
     */
    public static void startup(Thread thread, String fileName) throws ConfigException,
            DatabaseManagerException,
            SQLException {
        LogChannel channel = null;
        Config cfgSection = null;
        try {
            cfgSection = readConfig(null, fileName);
            channel = getLogChannel(cfgSection);
        } catch (Exception ex) {
            throw new ConfigException("Unable to invoke Logging Class defined in : "
                    + fileName);
        }
        logChannels.put(Thread.currentThread(), channel);

        DatabaseManager databaseManager = new StandardDatabaseManager(cfgSection);
        databaseManagers.put(thread, databaseManager);
        if (defaultDatabaseManager == null) {
            defaultLogChannel = channel;
            defaultDatabaseManager = databaseManager;
        }
        ((StandardDatabaseManager) databaseManager).initCaches(databaseManager.getClass()
                .getClassLoader());
        setDodsConfigured(true);
    }

    // private static LogChannel getLogChannel(String cf) throws
    // Exception {
    // try {
    // FileInputStream configFIS = new FileInputStream(cf);
    // ConfigFile cFile = new ConfigFile(configFIS);
    // Config config = cFile.getConfig();
    // configFIS.close();
    // Config logSection = (Config)
    // config.getSection("DatabaseManager");
    // String logClassName =
    // logSection.getString("LogClassName","com.lutris.logging.StandardLogger");
    //
    // Class loggerClass;
    // Class[] argTypeArr = {Boolean.TYPE};
    // Object[] argArr = {new Boolean(false)};
    //
    // loggerClass = Class.forName(logClassName);
    // Constructor logConstructor =
    // loggerClass.getConstructor(argTypeArr);
    // Logger logger = (Logger) (logConstructor.newInstance(argArr));
    //
    // logger.configure(logSection);
    // return logger.getChannel("DatabaseManager");
    // } catch (Throwable t) {}
    // return getLogChannel(null ,cf);
    // }
    private static LogChannel getLogChannel(Config logSection/*
                                                                 * URL
                                                                 * confURL,
                                                                 * String
                                                                 * confFile
     */) throws ConfigException {
        try {
            String logClassName = logSection.getString("LogClassName",
                    "com.lutris.logging.StandardLogger");

            Class loggerClass;
            Class[] argTypeArr = {
                Boolean.TYPE
            };
            Object[] argArr = {
                Boolean.valueOf(false)
            };

            loggerClass = Class.forName(logClassName);
            Constructor logConstructor = loggerClass.getConstructor(argTypeArr);
            Logger logger = (Logger) (logConstructor.newInstance(argArr));

            logger.configure(logSection);
            return logger.getChannel("DatabaseManager");
        } catch (Throwable t) {
        }
        return configureStandardLogerChannel();
    }

    public static LogChannel configureStandardLogerChannel() throws ConfigException {
        // LogChannel channel = null;

        try {
            File logFile = new File("/tmp/DatabaseManager.log");
            StandardLogger logger = new StandardLogger(false);
            String[] fileLogLevels = {
                "EMERGENCY",
                "ALERT",
                "CRITICAL",
                "ERROR",
                "WARNING",
                "NOTICE",
                "INFO"
            };
            String[] stdErrLogLevels = {
                "EMERGENCY",
                "ALERT",
                "CRITICAL",
                "ERROR",
                "WARNING",
                "NOTICE",
                "INFO"
            };

            logger.configure(logFile, fileLogLevels, stdErrLogLevels);
            return logger.getChannel("databaseManager");
        } catch (Exception ex) {
            throw new ConfigException("Unable to invoke standard logger.");
        }
    }

    /**
     * Associates the given DatabaseManager object with given thread. If
     * default DatabaseManager is null, the default DatabaseManager will
     * also be set.
     *
     * @param thread the thread to associate with
     * <code>DatabaseManager</code>.
     * @param databaseManager the DatabaseManager to associate the
     * <code>Thread</code>.
     */
    public static void register(Thread thread, DatabaseManager databaseManager) {
        databaseManagers.put(thread, databaseManager);
        if (defaultDatabaseManager == null) {
            defaultDatabaseManager = databaseManager;
        }
        setDodsConfigured(true);
    }

    /**
     * Sets the default logChannel.
     *
     * @param channel LogChannel that will be set as default LogChannel.
     */
    public static void registerDefaultLogChannel(LogChannel channel) {
        defaultLogChannel = channel;
    }

    /**
     * In threading mode, this method associates the
     * <code>channel</code> object with the current thread. In
     * non-threading mode, only default <code>channel</code> will be
     * set.
     *
     * @param channel LogChannel that will be set.
     */
    public static void registerLogChannel(LogChannel channel) {
        if (threading) {
            logChannels.put(Thread.currentThread(), channel);
        }
        if (defaultLogChannel == null) {
            defaultLogChannel = channel;
        }
    }

    /**
     * Associates the given <code>channel</code> object with the given
     * thread.
     *
     * @param thread the thread to associate with <code>channel</code>.
     * @param channel the <code>channel</code> to associate the
     * <code>Thread</code>.
     */
    public static void registerLogChannel(Thread thread, LogChannel channel) {
        logChannels.put(thread, channel);
        if (defaultLogChannel == null) {
            defaultLogChannel = channel;
        }
    }

    /**
     * Unregisters default <code>DatabaseManager</code>. Call this
     * method to release default <code>DatabaseManager</code>.
     *
     * @return unregistered default <code>DatabaseManager</code>.
     * @exception DODSException If an error occurs in unregistering the
     * DatabaseManager.
     */
    public static DatabaseManager unregisterDefault() throws DODSException {
        try {
            DatabaseManager dbManager = defaultDatabaseManager;

            defaultDatabaseManager = null;
            return dbManager;
        } catch (Exception e) {
            throw new DODSException(e);
        }
    }

    /**
     * In threading mode, this method unregisters
     * <code>DatabaseManager</code> associated with the current
     * thread. In non-threading mode, only default
     * <code>DatabaseManager</code> will be unregistered. Call this
     * method to release <code>DatabaseManager</code>.
     *
     * @return unregistered <code>DatabaseManager</code>.
     * @exception DODSException If an error occurs in unregistering the
     * DatabaseManager.
     */
    public static DatabaseManager unregister() throws DODSException {
        try {
            DatabaseManager dbManager;

            if (threading) {
                return (DatabaseManager) databaseManagers.remove(Thread.currentThread());
            }
            dbManager = defaultDatabaseManager;
            defaultDatabaseManager = null;
            return dbManager;
        } catch (Exception e) {
            throw new DODSException(e);
        }
    }

    /**
     * Unregisters <code>DatabaseManager</code> associated with the
     * given thread. Call this method to release
     * <code>DatabaseManager</code>.
     *
     * @return unregistered <code>DatabaseManager</code>.
     * @exception DODSException If an error occurs in unregistering the
     * DatabaseManager.
     */
    public static DatabaseManager unregister(Thread thread) throws DODSException {
        try {
            return (DatabaseManager) databaseManagers.remove(thread);
        } catch (Exception e) {
            throw new DODSException(e);
        }
    }

    /**
     * Unregisters default<code>Logger</code>. Call this method to
     * release default <code>Logger</code>.
     *
     * @return unregistered default <code>Logger</code>.
     * @exception DODSException If an error occurs in unregistering the
     * logger.
     */
    public static LogChannel unregisterDefaultLogChannel() throws DODSException {
        try {
            LogChannel channel = defaultLogChannel;
            defaultLogChannel = null;
            return channel;
        } catch (Exception e) {
            throw new DODSException(e);
        }
    }

    /**
     * In threading mode, this method unregisters
     * <code>LogChannel</code> associated with the current thread. In
     * non-threading mode, only default <code>LogChannel</code> will
     * be unregistered. Call this method to release
     * <code>LogChannel</code>.
     *
     * @return unregistered <code>LogChannel</code>.
     * @exception DODSException If an error occurs in unregistering the
     * LogChannel.
     */
    public static LogChannel unregisterLogChannel() throws DODSException {
        try {
            if (threading) {
                return (LogChannel) logChannels.remove(Thread.currentThread());
            } else {
                return unregisterDefaultLogChannel();
            }
        } catch (Exception e) {
            throw new DODSException(e);
        }
    }

    /**
     * Unregisters <code>LogChannel</code> associated with the given
     * thread. Call this method to release <code>LogChannel</code>.
     *
     * @return unregistered <code>LogChannel</code>.
     * @exception DODSException If an error occurs in unregistering the
     * LogChannel.
     */
    public static LogChannel unregisterLogChannel(Thread thread) throws DODSException {
        try {
            return (LogChannel) logChannels.remove(thread);
        } catch (Exception e) {
            throw new DODSException(e);
        }
    }

    /**
     * Returns the default DatabaseManager.
     *
     * @return the default DatabaseManager.
     */
    public static DatabaseManager getDefaultDatabaseManager() {
        checkDodsConfiguration();
        return defaultDatabaseManager;
    }

    /**
     * Returns the DatabaseManager object for the current thread.
     * Returns default DatabaseManager if there is no database manager
     * associated with the current thread. Returns null if default
     * DatabaseManager is not set. If non-threading mode is used,
     * default <code>DatabaseManager</code> will be returned.
     *
     * @return the DatabaseManager object, if available, otherwise null.
     */
    public static DatabaseManager getDatabaseManager() {
        checkDodsConfiguration();
        if (threading) {
            DatabaseManager dbManager = (DatabaseManager) databaseManagers.get(Thread.currentThread());

            if (dbManager != null) {
                return dbManager;
            }
        }
        return defaultDatabaseManager;
    }

    /**
     * Returns the DatabaseManager object for the given thread. Returns
     * default DatabaseManager if there is no database manager
     * associated with the thread. Returns null if default
     * DatabaseManager is not set.
     *
     * @param thread the thread to associate with the
     * <code>DatabaseManager</code>.
     * @return the DatabaseManager object, if available, otherwise null.
     */
    public static DatabaseManager getDatabaseManager(Thread thread) {
        checkDodsConfiguration();
        DatabaseManager dbManager = (DatabaseManager) databaseManagers.get(thread);

        if (dbManager != null) {
            return dbManager;
        }
        return defaultDatabaseManager;
    }

    /**
     * Returns the default logger.
     *
     * @return The default logger.
     */
    public static LogChannel getDefaultLogChannel() {
        try {
            if (defaultLogChannel == null) {
                defaultLogChannel = configureStandardLogerChannel();
            }
        } catch (ConfigException ex) {
        }
        return defaultLogChannel;
    }

    /**
     * Returns the logger object for the current thread. Returns default
     * logger if there is no logger associated with the current thread.
     * Returns null if default logger is not set. If non-threading mode
     * is used, default <code>Logger</code> will be returned.
     *
     * @return the logger object, if available, otherwise null.
     */
    public static LogChannel getLogChannel() {
        if (threading) {
            LogChannel channel = (LogChannel) logChannels.get(Thread.currentThread());

            if (channel != null) {
                return channel;
            }
        }
        return getDefaultLogChannel();
    }

    /**
     * Returns the logger object for the given thread. Returns default
     * logger if there is no logger associated with the thread. Returns
     * null if default logger is not set.
     *
     * @param thread the thread to associate with the logger.
     * @return the logger object, if available, otherwise null.
     */
    public static LogChannel getLogChannel(Thread thread) {
        LogChannel channel = (LogChannel) logChannels.get(thread);

        if (channel != null) {
            return channel;
        }
        return defaultLogChannel;
    }

    /**
     * Shutdowns all <code>DatabaseManager</code>s and
     * <code>Loggers</code>s. Call this method to release and
     * shutdown all <code>DatabaseManager</code>s and
     * <code>Loggers</code>s.
     *
     * @exception DODSException If an error occurs in releasing
     * DatabaseManagers and loggers.
     */
    public static void shutdown() throws DODSException {
        try {
            if (threading) {
                Set keys = databaseManagers.keySet();

                for (Iterator iter = keys.iterator(); iter.hasNext();) {
                    Thread key = (Thread) iter.next();
                    DatabaseManager dbManager = (DatabaseManager) databaseManagers.remove(key);

                    if (dbManager != null) {
                        dbManager.shutdown();
                        dbManager = null;
                    }
                }
                keys = logChannels.keySet();
                for (Iterator iter = keys.iterator(); iter.hasNext();) {
                    Thread key = (Thread) iter.next();

                    logChannels.remove(key);
                }
            }
            if (defaultDatabaseManager != null) {
                defaultDatabaseManager.shutdown();
                defaultDatabaseManager = null;
            }
            dodsConfigured = false;
        } catch (Exception e) {
            throw new DODSException(e);
        }
    }

    /**
     * Returns the mode of usage. If this flag is <code>true</code>,
     * DODS uses multi threading mode. This means that DODS handles
     * multiple threads, like Enhydra application server (each
     * application in one <code>Thread</code>). If this flag is
     * <code>false</code>, there can be more then one
     * <code>Thread</code>, but there is only one
     * <code>DatabaseManager</code> for all <code>Thread</code>s
     * (for the whole application).
     *
     * @return <code>true</code> if threading mode is used, otherwise
     * <code>false</code>.
     */
    public static boolean isThreading() {
        return threading;
    }

    /**
     * Sets mode of usage. If this flag is <code>true</code>, DODS
     * uses multi threading mode. This means that DODS handles multiple
     * threads, like Enhydra application server (each application in one
     * <code>Thread</code>). If this flag is <code>false</code>,
     * there can be more then one <code>Thread</code>, but there is
     * only one <code>DatabaseManager</code> for all
     * <code>Thread</code>s (for the whole application).
     *
     * @param mode mode of usage.
     */
    public static void setThreading(boolean mode) {
        threading = mode;
    }

    /**
     * Initializes DODS. Sets default logger.
     */
    protected static void init() {
        dodsConfigured = false;
        threading = false;
        databaseManagers = new Hashtable();
        logChannels = new Hashtable();
    }

    private static void checkDodsConfiguration() {
        String confFilePath = null;
        try {
            if (!dodsConfigured) {
                confFilePath = System.getProperty(CommonConstants.DODS_CONFIG_FILE_PROPERTY_NAME);
                if (null == confFilePath) {
                    try {
                        Context initContext = new InitialContext();
                        Context envContext = (Context) initContext.lookup(CommonConstants.JNDI_ENV);
                        confFilePath = (String) envContext.lookup(CommonConstants.DODS_CONFIG_FILE_LOOKUP);
                    } catch (Exception e) {
                    }
                }
                if (confFilePath != null) {
                    DODS.startup(confFilePath);
                } else {
                    DODS.startup((URL) null,
                            CommonConstants.DEFAULT_CONFIG_FILE_NAME);
                }
            }
        } catch (Exception e) {
            dodsConfigured = false;
        }
    }

    /**
     * @return Returns the dodsConfigured.
     */
    protected static boolean isDodsConfigured() {
        return dodsConfigured;
    }

    /**
     * @param configured The dodsConfigured to set.
     */
    protected static void setDodsConfigured(boolean configured) {
        DODS.dodsConfigured = configured;
    }

}
