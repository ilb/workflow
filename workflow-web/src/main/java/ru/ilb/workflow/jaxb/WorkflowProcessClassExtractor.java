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
package ru.ilb.workflow.jaxb;

import at.together._2006.xpil1.MainWorkflowProcessInstance;
import org.eclipse.persistence.descriptors.ClassExtractor;
import org.eclipse.persistence.sessions.Record;
import org.eclipse.persistence.sessions.Session;

/**
 *
 * @author slavb
 */
public class WorkflowProcessClassExtractor extends ClassExtractor {

    @Override
    public Class extractClassFromRow(Record record, Session sn) {
        return MainWorkflowProcessInstance.class;
    }
    
}
