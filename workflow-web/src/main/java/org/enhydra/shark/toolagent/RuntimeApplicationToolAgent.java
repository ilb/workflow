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
package org.enhydra.shark.toolagent;

import java.io.File;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.nio.charset.StandardCharsets;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Iterator;
import java.util.List;
import org.enhydra.jawe.shark.business.SharkConstants;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.client.wfservice.WMEntity;
import org.enhydra.shark.api.internal.toolagent.AppParameter;
import org.enhydra.shark.api.internal.toolagent.ApplicationBusy;
import org.enhydra.shark.api.internal.toolagent.ApplicationNotDefined;
import org.enhydra.shark.api.internal.toolagent.ApplicationNotStarted;
import org.enhydra.shark.api.internal.toolagent.ToolAgentGeneralException;
import org.enhydra.shark.utilities.appparameter.AppParameterUtilities;
import ru.ilb.filedossier.entities.Store;
import ru.ilb.filedossier.store.StoreFactory;
import ru.ilb.workflow.toolagent.objectconverter.ObjectConverter;
import ru.ilb.workflow.toolagent.objectconverter.ObjectConverterFactory;
import ru.ilb.workflow.utils.IOUtils;
import ru.ilb.workflow.utils.SpringApplicationContext;

/**
 * Tool agent that can execute some system application.
 *
 * @author Sasa Bojanic
 * @version 1.0
 */
public class RuntimeApplicationToolAgent extends AbstractToolAgent {

    private final ObjectConverterFactory objectConverterFactory = new ObjectConverterFactory();

    public static final long APP_MODE_SYNCHRONOUS = 0;

    public static final long APP_MODE_ASYNCHRONOUS = 1;

    public static final String REQUEST_PARAM = "request";
    public static final String RESPONSE_PARAM = "request";

    private Process p;

    public void invokeApplication(WMSessionHandle shandle,
            long handle,
            WMEntity appInfo,
            WMEntity toolInfo,
            String applicationName,
            String procInstId,
            String assId,
            AppParameter[] parameters,
            Integer appMode)
            throws ApplicationNotStarted,
            ApplicationNotDefined,
            ApplicationBusy,
            ToolAgentGeneralException {

        super.invokeApplication(shandle,
                handle,
                appInfo,
                toolInfo,
                applicationName,
                procInstId,
                assId,
                parameters,
                appMode);

        try {
            status = APP_STATUS_RUNNING;

            if (appName == null || appName.trim().length() == 0) {
                readParamsFromExtAttributes((String) parameters[0].the_value);
            }

            List<String> commands = new ArrayList<>();
            commands.addAll(Arrays.asList(appName.split(" ")));
            StoreFactory storeFactory = SpringApplicationContext.getApplicationContext().getBean(StoreFactory.class);
            // FIXME: hard coded dossier publictation
            Store store = storeFactory.getStore(procInstId);

            ProcessBuilder pb = new ProcessBuilder(commands);
            File commandFile = Paths.get(commands.get(0)).toFile();
            if (!commandFile.exists()) {
                throw new IllegalArgumentException(commandFile.toString() +" does not exists");
            }
            if (!commandFile.canExecute()) {
                throw new IllegalArgumentException(commandFile.toString() +" not executable");
            }

            pb.directory(commandFile.getParentFile());
            p = pb.start();

            handleRequest(parameters, store, p.getOutputStream());
            p.getOutputStream().close();

            if (appMode != null && appMode.intValue() == APP_MODE_SYNCHRONOUS) {
                if (p.waitFor() != 0) {
                    String errors = IOUtils.readString(p.getErrorStream(), StandardCharsets.UTF_8);
                    throw new RuntimeException("exit code " + p.exitValue() + " \n" + errors);
                    //+ "\n" + "output: " + readString(p.getInputStream(), StandardCharsets.UTF_8)
                }
                handleResponse(parameters, store, p.getInputStream());
            }

            status = APP_STATUS_FINISHED;

        } catch (IOException ioe) {
            cus.error(shandle, "RuntimeApplicationToolAgent - application "
                    + appName + " terminated incorrectly for [process="
                    + procInstId + ",assignment=" + assId
                    + "], can't find executable: " + ioe);
            throw new ApplicationNotDefined("Can't find executable " + appName, ioe);
        } catch (Throwable ex) {
            status = APP_STATUS_INVALID;
            cus.error(shandle, "RuntimeApplicationToolAgent - application "
                    + appName + " terminated incorrectly for [process="
                    + procInstId + ",assignment=" + assId + "]:" + ex);
            throw new ToolAgentGeneralException(ex);
        }

    }

    private void handleRequest(AppParameter[] parameters, Store store, OutputStream os) throws Exception {
        AppParameter requestParam = AppParameterUtilities.getParameterByName(parameters, REQUEST_PARAM);
        if (requestParam != null) {
            String requestSource = (String) requestParam.the_value;
            if (requestSource.startsWith("^")) { // parameter serialization
                ObjectConverter objectConverter = objectConverterFactory.getObjectConverter(requestSource.substring(1));
                objectConverter.marshall(parameters, p.getOutputStream());
            } else if (requestSource.startsWith("@")) { // file request
                byte[] contents = store.getContents(requestSource.substring(1));
                os.write(contents);
            }
        } else {
            //serialize to json by default
            ObjectConverter objectConverter = objectConverterFactory.getObjectConverter("application/json");
            objectConverter.marshall(parameters, p.getOutputStream());
        }
    }

    private void handleResponse(AppParameter[] parameters, Store store, InputStream is) throws Exception {
        String result = IOUtils.readString(p.getInputStream(), StandardCharsets.UTF_8);

        // параметры выходного значения
        AppParameter responseParam = AppParameterUtilities.getParameterByName(this.parameters, RESPONSE_PARAM);
        if (responseParam != null) {
            String responseTarget = (String) responseParam.the_value;
            if (responseTarget.startsWith("^")) { // parameter deserialization
                ObjectConverter objectConverter = objectConverterFactory.getObjectConverter(responseTarget.substring(1));
                objectConverter.unmarshall(parameters, result);
            }
        } else {
            //unserialize from json by default
            ObjectConverter objectConverter = objectConverterFactory.getObjectConverter("application/json");
            objectConverter.unmarshall(parameters, result);
            String filename = appInfo.getAppId()+".json";
            store.setContents(filename, result.getBytes());
        }

    }

    /*public void terminate () {
    try {
    p.destroy();
    if (appMode.equals(APP_MODE_SYNCHRONOUS)) {
    status=APP_STATUS_TERMINATED;
    }
    } catch (Throwable ex) {}
    }*/
    public String getInfo(WMSessionHandle shandle) throws ToolAgentGeneralException {
        String i = "Executes some system applications like notepad or any other executable application."
                + "\nIt is important that this application should be in the system path of machine where shark is running."
                + "\nf you use application mode 0 (zero), the tool agent will wait until the executable application "
                + "\nis completed, and if you choose application status other then 0 the tool agent will finish its work as "
                + "\nsoon as the executable application is started (this usually happens immediately), and shark "
                + "\nwill proceed to the next activity, even if the executable application is still running "
                + "\n(this is asynchronous starting of some external applications)"
                + "\nThis tool agent accepts parameters (AppParameter class instances), but does not modify any."
                + "\nThe parameters sent to this tool agents, for which the corresponding application definition "
                + "\nformal parameters are of \"IN\" type, and whose data type is string, are added as suffixes to "
                + "\nthe application name, and resulting application that is started could be something like "
                + "\n             \"notepad c:\\Shark\\readme\""
                + "\n"
                + "\nThis tool agent is able to understand the extended attributes with the following names:"
                + "\n     * AppName - value of this attribute should represent the executable application name to "
                + "\n                 be executed by tool agent (must be in a system path)"
                + "\n     * AppMode - value of this attribute should represent the mode of execution, if set to "
                + "\n                 0 (zero), tool agent will wait until the executable application is finished."
                + "\n"
                + "\n NOTE: Tool agent will read extended attributes only if they are called through"
                + "\n       Default tool agent (not by shark directly) and this is the case when information "
                + "\n       on which tool agent to start for XPDL application definition is not contained in mappings";
        return i;
    }

}
