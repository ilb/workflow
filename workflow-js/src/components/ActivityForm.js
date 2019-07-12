import React, { useState, useEffect, useRef } from 'react';
import { Table, Button, Message, Loader } from 'semantic-ui-react';
import {useResource} from '../ReactHelper';
import DefaultActivityForm from './DefaultActivityForm';
import { DefaultApi as WorkflowApi} from '@ilb/workflow-api/dist';

export default function ActivityFormContainer( {processInstanceId, activityInstanceId, component}) {
    const api = new WorkflowApi();

    const activityFromResorce = (activityInstanceId, processInstanceId) => {
        console.log('activityFromResorce', activityInstanceId, processInstanceId);
        if (activityInstanceId != null) {
            return api.getActivityForm(activityInstanceId, processInstanceId);
        } else {
            return api.getActivityForm1(processInstanceId)
        }
    }
    const [data, getData] = useResource(() => activityFromResorce(activityInstanceId, processInstanceId));

    useEffect(() => {
        getData();
    }, [processInstanceId, activityInstanceId]);


    return <div className="activityFormContainer">
        {data.loading && <Loader active /> }
        {data.error && <Message error visible content={data.error}/> }
        {data.value && <ActivityForm activityFormData={data.value} component={component}/>}
    </div>;
}
function ActivityForm({activityFormData, component}) {
    return <div className="activityForm">
        <ActivityFormHeader activityFormData={activityFormData}/>
        { component ? component : <DefaultActivityForm activityFormData={activityFormData}/>}
        <ActivityFormFooter activityFormData={activityFormData}/>
    </div>
}

function ActivityFormHeader({activityFormData}) {
    return <div className="activityFormHeader">
        Этап: {activityFormData.activityInstance.name}
    </div>;
}

function ActivityFormFooter({activityFormData}) {
    return <div className="activityFormFooter"/>;
}

