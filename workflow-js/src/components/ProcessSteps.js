import React, { useState, useEffect, useRef } from 'react';
import {useResource} from '../ReactHelper';
import { Message, Loader, Icon, Step } from 'semantic-ui-react'
import { ApiClient, DefaultApi } from 'workflow-api/dist';

export default function ProcessSteps( {processId}) {
    const api = new DefaultApi();
    const [data, getData] = useResource(() => api.getProcessSteps(processId));

    useEffect(() => {
        getData();
    }, [processId]);

    // TEMP FIX JSON
    return <div className="processSteps">
        {data.loading && <Loader active /> }
        {data.error && <Message error visible content={data.error}/> }
        {data.value && <Step.Group items={JSON.parse(JSON.stringify(data.value.processStep))}/> }
    </div>;
}