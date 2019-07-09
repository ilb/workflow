import React, { useState, useEffect, useRef } from 'react';
import {useResource} from '../ReactHelper';
import JsonSchemaForm from '@bb/jsonschema-form';
import { Table, Button, Message, Loader } from 'semantic-ui-react';
import '@bb/datetime-picker/lib/index.css';
import { DefaultApi } from 'workflow-api/dist';

export default function DefaultActivityForm({activityFormData}) {
    const api = new DefaultApi();
    const activityId = activityFormData.activityInstance.id;
    const processId = activityFormData.activityInstance.processInstanceId

    const errorHandler = (data) => {
        alert(data.error);
    }
    const submitHandler = (data) => {
        console.log('submitting', data.formData);
        api.completeActivity(activityId, processId, {body: data.formData})
                .catch(errorHandler);

    }
    return <div className="defaultActivityForm">

        <JsonSchemaForm
            schema={activityFormData.jsonSchema}
            formData={activityFormData.formData}
            uiSchema={activityFormData.uiSchema}
            onSubmit={submitHandler}
            >
            <div>
                { activityFormData.activityInstance.state.open && 
                    <button type="submit" className="ui green button">Выполнить</button>
                }
            </div>
        </JsonSchemaForm>


    </div>;
}