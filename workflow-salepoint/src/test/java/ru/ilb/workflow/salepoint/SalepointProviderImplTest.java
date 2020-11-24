/*
 * Copyright 2020 slavb.
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
package ru.ilb.workflow.salepoint;

import java.net.URI;
import java.net.URISyntaxException;
import static org.junit.jupiter.api.Assertions.*;
import org.junit.jupiter.api.Test;

/**
 *
 * @author slavb
 */
public class SalepointProviderImplTest {

    public SalepointProviderImplTest() {
    }

    /**
     * Test of getSalepointUid method, of class SalepointProviderImpl.
     */
    @Test
    public void testGetSalepointUid() throws URISyntaxException {
        System.out.println("getSalepointUid");
        URI toURI = this.getClass().getResource("getSalepointByUser.xml").toURI();
        String authorisedUser = "slavb";
        SalepointProviderImpl instance = new SalepointProviderImpl(toURI.toString());
        String expResult = "ru.bystrobank.sales.users";
        String result = instance.getSalepointUid(authorisedUser);
        assertEquals(expResult, result);
    }

}
