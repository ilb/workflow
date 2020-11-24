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
package ru.ilb.workflow.core;

import ru.ilb.workflow.entities.DataField;

/**
 *
 * @author slavb
 */
public class DataFieldImpl implements DataField {

    /**
     * parameter id
     */
    protected final String id;
    /**
     * paramter description
     */
    protected final String name;
//    protected Class dataType;
    protected final boolean isArray;

    public DataFieldImpl(org.enhydra.jxpdl.elements.DataField dataField) {
        this.id = dataField.getName();
        this.name = dataField.getDescription();
        this.isArray = dataField.getIsArray();
    }

    public DataFieldImpl(String id, String name, boolean isArray) {
        this.id = id;
        this.name = name;
        this.isArray = isArray;
    }

    @Override
    public String getId() {
        return id;
    }

//    @Override
//    public void setId(String id) {
//        this.id = id;
//    }
    @Override
    public String getName() {
        return name;
    }

//    @Override
//    public void setName(String name) {
//        this.name = name;
//    }
//    @Override
//    public Class getDataType() {
//        return dataType;
//    }
//
//    @Override
//    public void setDataType(Class dataType) {
//        this.dataType = dataType;
//    }
    @Override
    public boolean isIsArray() {
        return isArray;
    }

//    @Override
//    public void setIsArray(boolean isArray) {
//        this.isArray = isArray;
//    }
}
