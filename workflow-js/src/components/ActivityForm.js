import React, { useState, useEffect, useRef } from 'react';
import { Table, Button, Message, Loader } from 'semantic-ui-react';
import {useResource} from '../ReactHelper';
import ProcessSteps from './ProcessSteps';
import DefaultActivityForm from './DefaultActivityForm';
import { ApiClient, DefaultApi } from 'workflow-api/dist';
import '../Config';

export default function ActivityForm( {processId, activityId, component}) {
    const api = new DefaultApi();
    const [data, getData] = useResource(() => api.getActivityInstance(activityId,processId));

    useEffect(() => {
        getData();
    }, [processId, activityId]);

    
    return <div className="activityForm">
        {data.loading && <Loader active /> }
        {data.error && <Message error visible content={data.error}/> }
        {data.value &&
                    <div>
                        <ProcessHeader process={data.value}/>
                        <ProcessSteps  processId={processId} />
                        { component ? component : <DefaultActivityForm processId={processId} activityId={activityId}/>}
                        <ProcessFooter process={data.value}/>
                    </div>

        }
    </div>;
}

function ProcessHeader( {process}) {
    return <div className="processHeader">
        Name: {process.name}
    </div>;
}

function ProcessFooter( {process}) {
    return <div className="processFooter"/>;
}

