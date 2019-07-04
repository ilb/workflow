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
package ru.ilb.workflow.assignment;

import java.util.Arrays;
import java.util.Set;
import org.enhydra.shark.api.client.wfmc.wapi.WAPI;
import org.enhydra.shark.api.client.wfmc.wapi.WMAttribute;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.internal.assignment.PerformerData;
import org.enhydra.shark.assignment.standard.StandardAssignmentManager;
import org.enhydra.shark.utilities.interfacewrapper.SharkInterfaceWrapper;

/**
 *
 * @author slavb
 */
public class AttendeeAssignmentManager extends StandardAssignmentManager{
    protected static final String ATTENDEE_RESPONSIBLE="ATTENDEE_responsible";

    @Override
    protected Set findResources(WMSessionHandle shandle, String procId, String actId, PerformerData p) throws Exception {
        Set res=super.findResources(shandle, procId, actId, p);
        WAPI wapi = SharkInterfaceWrapper.getShark().getWAPIConnection();
        WMAttribute wmAttendeeResponsible = wapi.getProcessInstanceAttributeValue(shandle, procId, ATTENDEE_RESPONSIBLE);
        if(wmAttendeeResponsible!=null){
            String[] attendeeResponsible=(String[])wmAttendeeResponsible.getValue();
            res.addAll(Arrays.asList(attendeeResponsible));
        }
        return res;
    }

}
