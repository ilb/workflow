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
package ru.ilb.workflow.context.web;

import java.net.URI;
import java.net.URISyntaxException;
import java.util.HashMap;
import java.util.Map;
import javax.ws.rs.core.Response;
import org.junit.After;
import org.junit.AfterClass;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Test;
import static org.junit.Assert.*;
import org.junit.Ignore;
import ru.ilb.callcontext.core.CallContextFactoryImpl;
import ru.ilb.callcontext.core.ContextParserImpl;
import ru.ilb.callcontext.core.ContextReaderImpl;
import ru.ilb.callcontext.entities.CallContextFactory;
import ru.ilb.workflow.context.ContextConstants;
import ru.ilb.workflow.entities.ActivityInstance;
import ru.ilb.workflow.entities.ProcessContext;
import ru.ilb.workflow.entities.ProcessInstance;
import ru.ilb.workflow.entities.ProcessInstanceFactory;
import ru.ilb.workflow.stub.ActivityInstanceMock;
import ru.ilb.workflow.stub.ProcessContextMock;
import ru.ilb.workflow.stub.ProcessInstanceFactoryMock;
import ru.ilb.workflow.stub.ProcessInstanceMock;

/**
 *
 * @author slavb
 */
public class ActivityCallbackImplTest {

    public ActivityCallbackImplTest() {
    }

    @BeforeClass
    public static void setUpClass() {
    }

    @AfterClass
    public static void tearDownClass() {
    }

    @Before
    public void setUp() {
    }

    @After
    public void tearDown() {
    }

    /**
     * Test of activityCallback method, of class ActivityCallbackImpl.
     */
    @Test
    @Ignore
    public void testActivityCallback() throws URISyntaxException {
        System.out.println("activityContext");
        String x_remote_user = "";
        String callId = "123";
        String callerId = "456";
        URI contextUri = this.getClass().getClassLoader().getResource("testcontext.json").toURI();
        CallContextFactory callContextFactory = new CallContextFactoryImpl(new ContextReaderImpl(), new ContextParserImpl());
//        SessionData sessionData = new SessionDataImpl(authorisedUser -> new WMSessionHandle());

        Map<String, Object> processContextMap = new HashMap<>();
        processContextMap.put(ContextConstants.CONTEXTURL_VARIABLE, contextUri);

        Map<String, Object> activityContextMap = new HashMap<>();
        activityContextMap.put("key", "value");

        ProcessContext processContext = new ProcessContextMock(processContextMap);
        ProcessContext activityContext = new ProcessContextMock(activityContextMap);

        ActivityInstance activityInstance = new ActivityInstanceMock(activityContext);
        ProcessInstance processInstance = new ProcessInstanceMock(processContext, activityInstance);
        ProcessInstanceFactory processInstanceFactory = new ProcessInstanceFactoryMock(processInstance);

        URI resourceUri = URI.create("http://localhost/workflow/web/callcontext/activityCallback");

        URI responseUri = this.getClass().getClassLoader().getResource("testresponse.json").toURI();

        ActivityCallbackImpl instance = new ActivityCallbackImpl(processInstanceFactory, callContextFactory, resourceUri);
        String expCallbackUrl = "http://localhost/workflow/web/callcontext/activityCallback?callId=" + callId + "&callerId=" + callerId;
        //String expResult = "{\"link\":[{\"rel\":\"callback\",\"href\":\"" + expCallbackUrl + "\"}],\"key\":\"value\",\"k\":1}";
        //String expResult = "";
        Response result = instance.activityCallback(x_remote_user, callId, callerId, responseUri);
    }

}
