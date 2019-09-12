/*
 * Copyright 2017 slavb.
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
package ru.ilb.workflow.mappers;

import java.util.List;

/**
 *
 * @author slavb
 * @param <E> entity class
 * @param <D> dto class
 */
public interface GenericMapperDto<E, D> {

    D createFromEntity(E entity);

    List<D> createFromEntities(List<E> entities);

}
