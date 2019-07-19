import React, { useState, useEffect, useRef } from 'react';
import {useResource} from '../ReactHelper';
import JsonSchemaForm from '@bb/jsonschema-form';
import { Table, Button, Message, Loader, Step } from 'semantic-ui-react';
import '@bb/datetime-picker/lib/index.css';
import { DefaultApi } from '@ilb/workflow-api/dist';
import Dossier from '@ilb/filedossier-js/lib/Dossier';

export default function DefaultActivityForm({activityFormData}) {
    const api = new DefaultApi();
    const activityInstanceId = activityFormData.activityInstance.id;
    const processInstanceId = activityFormData.activityInstance.processInstanceId

    const errorHandler = (data) => {
        alert(data.error);
    }
    const submitHandler = (data) => {
        console.log('submitting', data.formData);
        api.completeAndNext(activityInstanceId, processInstanceId, {body: data.formData})
                .then(act => document.location=act.activityFormUrl.replace(/https:\/\/devel.net.ilb.ru\/workflow-js/,"http://" + document.location.host))
                .catch(errorHandler);

    }
    return <div className="defaultActivityForm">
        <Step.Group items={activityFormData.processStep}/>
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
        {activityFormData.activityDossier && <Dossier {...activityFormData.activityDossier}/> }


    </div>;
}