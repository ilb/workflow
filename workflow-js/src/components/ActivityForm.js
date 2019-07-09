import React, { useState, useEffect, useRef } from 'react';
import { Table, Button, Message, Loader } from 'semantic-ui-react';
import {useResource} from '../ReactHelper';
import DefaultActivityForm from './DefaultActivityForm';
import { ApiClient, DefaultApi } from 'workflow-api/dist';
import '../Config';

export default function ActivityFormContainer( {processId, activityId, component}) {
    const api = new DefaultApi();

    const activityFromResorce = (activityId, processId) => {
        console.log('activityFromResorce', activityId, processId);
        if (activityId != null) {
            return api.getActivityForm(activityId, processId);
        } else {
            return api.getActivityForm1(processId)
        }
    }
    const [data, getData] = useResource(() => activityFromResorce(activityId, processId));

    useEffect(() => {
        getData();
    }, [processId, activityId]);


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

