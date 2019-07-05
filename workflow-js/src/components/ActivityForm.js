import React, { useState, useEffect, useRef } from 'react';
import { Table, Button, Message, Loader } from 'semantic-ui-react';
import {useResource} from '../ReactHelper';
import ProcessSteps from './ProcessSteps';
import DefaultActivityForm from './DefaultActivityForm';
import { ApiClient, DefaultApi } from 'workflow-api/dist';
import '../Config';

export default function ActivityForm( {processId, activityId, component}) {
    const api = new DefaultApi();
    const [data, getData] = useResource(() => api.getActivityForm(activityId,processId));

    useEffect(() => {
        getData();
    }, [processId, activityId]);

    
    return <div className="activityForm">
        {data.loading && <Loader active /> }
        {data.error && <Message error visible content={data.error}/> }
        {data.value &&
                    <div>
                        <ActivityFormHeader actitityInstance={data.value.actitityInstance}/>
                        { component ? component : <DefaultActivityForm activityFormData={data.value}/>}
                        <ActivityFormFooter actitityInstance={data.value.actitityInstance}/>
                    </div>

        }
    </div>;
}

function ActivityFormHeader( actitityInstance) {
    return <div className="activityFormHeader">
        Name: {actitityInstance.name}
    </div>;
}

function ActivityFormFooter( actitityInstance) {
    return <div className="activityFormFooter"/>;
}

