import React, { useState, useEffect, useRef } from 'react';
import {useResource} from '../ReactHelper';
import JsonSchemaForm from '@bb/jsonschema-form';
import { Table, Button, Message, Loader } from 'semantic-ui-react';
import { DefaultApi } from 'workflow-api/dist';

export default function DefaultActivityForm( {processId, activityId}) {
    const api = new DefaultApi();
    const [data, getData] = useResource(() => api.getActivityForm(activityId, processId));
    useEffect(() => {
        getData();
    }, [processId, activityId]);

    const errorHandler = (data) => {
        alert(data.error);
    }
    const submitHandler = (data) => {
        console.log('submitting', data.formData);
        api.completeActivity(activityId, processId, {body: data.formData})
        .catch(errorHandler);

    }
    return <div className="defaultActivityForm">
        {data.loading && <Loader active /> }
        {data.error && <Message error visible content={data.error}/> }
        {data.value &&
                    <div>

                        <JsonSchemaForm
                            schema={data.value.jsonSchema}
                            formData={data.value.formData}
                            uiSchema={data.value.uiSchema}
                            onSubmit={submitHandler}
                            >
                            <div>
                                <button type="submit" className="ui green button">Выполнить</button>
                            </div>
                        </JsonSchemaForm>
                    </div>

        }

    </div>;
}