import React, { useState, useEffect, useRef } from 'react';
import {  Message, Loader, Select, Button } from 'semantic-ui-react'
import { ApiClient, DefaultApi } from '@ilb/workflow-api/dist';
import {useResource} from '../ReactHelper';


export default function ProcessSelectorContainer() {
    const api = new DefaultApi();

    const errorHandler = (data) => {
        alert(data.error);
    }

    const startProcess = () => {
        api.createProcessInstanceAndNext({processDefinitionId: "stockvaluation_fairpricecalc",body:{}})
                .then(act => document.location=act.activityFormUrl.replace(/https:\/\/devel.net.ilb.ru\/workflow-js/,"http://" + document.location.host))
                .catch(errorHandler);
    }
    return <div className="processSelectorContainer">
        <Button onClick={startProcess}>Start process</Button>
    </div>;
}

function ProcessSelectorContainer1() {
    const api = new DefaultApi();
    const [data, getData] = useResource(() => api.getProcessDefinitions());
    useEffect(() => {
        getData();
    }, []);

    return <div className="processSelectorContainer">
        {data.loading && <Loader active /> }
        {data.error && <Message error visible content={data.error}/> }
        {data.value && <ProcessSelector processDefinitions={data.value} />}
    </div>;

}

function ProcessSelector( {processDefinitions}) {


}
