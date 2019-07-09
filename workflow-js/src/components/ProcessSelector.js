import React, { useState, useEffect, useRef } from 'react';
import {  Message, Loader, Select, Button } from 'semantic-ui-react'
import { ApiClient, DefaultApi } from 'workflow-api/dist';
import {useResource} from '../ReactHelper';


export default function ProcessSelectorContainer() {
    const api = new DefaultApi();
    const startProcess = () => {
        alert('start!');
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