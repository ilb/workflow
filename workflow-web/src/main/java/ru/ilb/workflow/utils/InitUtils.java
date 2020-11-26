/**
 * Copyright (C) 2015 Bystrobank, JSC
 *
 * This program is free software: you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or (at your option) any later
 * version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * this program. If not, see http://www.gnu.org/licenses
 */
package ru.ilb.workflow.utils;

import javax.naming.InitialContext;
import javax.naming.NamingException;
import javax.servlet.ServletContext;
import org.enhydra.shark.eventaudit.notifying.NotifyingEventAuditManager;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import ru.ilb.workflow.eventaudit.CollectionEventAuditListener;

/**
 *
 * @author slavb
 */
public class InitUtils {

    private static final org.slf4j.Logger logger = LoggerFactory.getLogger(InitUtils.class);
    @Autowired
    ServletContext context;

    @Autowired
    CollectionEventAuditListener collectionEventAuditListener;

    String contextPath;

    public void initializeEngine() {
        contextPath = context.getRealPath("/");
        EngineUtils.setSharkProperties(contextPath);
        String XPDLRepositoryPath = null;
        try {
            javax.naming.Context ctx = new InitialContext();
            XPDLRepositoryPath = (String) ctx.lookup("java:comp/env/xpdlRepository");
        } catch (NamingException ex) {
            logger.error("xpdlRepository env is not set!", ex);
        }
        EngineUtils.setXpdlRepository(XPDLRepositoryPath);
        EngineUtils.setSnapshotImageCreator();
        initEventListeners();
    }

    public void stopEngine() {
        EngineUtils.stopEngine();
    }

    private void initEventListeners() {
        NotifyingEventAuditManager.addEventAuditListener(collectionEventAuditListener, NotifyingEventAuditManager.CREATION_EVENT_TYPE);
        NotifyingEventAuditManager.addEventAuditListener(collectionEventAuditListener, NotifyingEventAuditManager.STATE_EVENT_TYPE);
    }

}
