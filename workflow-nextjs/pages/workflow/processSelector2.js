import React, { useState, useEffect, useRef } from 'react';
import {  Message, Loader, Select, Button } from 'semantic-ui-react'
// import { ApiClient, DefaultApi } from '@ilb/workflow-api/dist';
import { ApiClient, ProcessDefinitionsApi, ProcessInstancesApi } from '@ilb/workflow-api/dist';
import { useResource } from '../api/ReactHelper';
import { Dropdown, Menu } from 'semantic-ui-react';
import '@bb/semantic-ui-css/semantic.min.css'
import config from '../../conf/config';


// function ProcessSelectorContainer(data) {
const ProcessSelectorContainer = (props) => {
    console.log('ProcessSelectorContainer2 props', props);
    const data = props && props.processDefinition;
    // const api = new ProcessDefinitionsApi();
    // const api2 = new ProcessDefinitionsApi(config.workflowApiClient(null));
    // console.log('config.workflowApiClient(null)', config.workflowApiClient(null));
    // console.log('pro///////////////');

    // const [data, getData] = useResource(() => api2.getProcessDefinitions({enabled: true}));
    // // const [data, getData] = useState(api2.getProcessDefinitions({enabled: true}));
    // // const [data, getData] = useResource(() => api.getProcessDefinitions({}));
    // console.log('data, getData', data, getData);
    // useEffect(() => {
    //     getData();
    // }, []);

    const api = new ProcessInstancesApi(config.workflowApiClient(null));

    //--------------
    const errorHandler = (data) => {
        alert(data.error);
    }

    const startProcess = (optionValue_) => {
      console.log('optionValue', optionValue || optionValue_);
      // alert(optionValue);
      // "stockvaluation_fairpricecalc"
        if (!(optionValue || optionValue_)) {
          alert('Процесс не выбран');
          return false;
        }
        api.createProcessInstanceAndNext({processDefinitionId: optionValue || optionValue_, body:{}})
            .then(act => document.location=act.activityFormUrl.replace(/https:\/\/devel.net.ilb.ru\/workflow-js/,"http://" + document.location.host))
            .catch(errorHandler);
    }

    //-------------
    const processDefinition = data && data.processDefinition;
    console.log('processDefinition', processDefinition);
    const options = [];
    const createOption = (optionData) => {
      return { key: optionData.name, text: optionData.definitionName, value: optionData.id }
    };
    if (processDefinition) {
      Object.keys(processDefinition).forEach(el => options.push(createOption(processDefinition[el])));
    }
    console.log('options', options);

    const [optionValue, setOptionValue] = useState(null);

    return <div className="processSelectorContainer">
    123
      {data && data.loading && <Loader active /> }
      {data && data.error && <Message error visible content={data.error}/> }
      {processDefinition && <div>
        <Menu compact>
          <Dropdown
            // inline
            text='Запустить процесс'
            onChange={(e, data) => {
              console.log('12344', data.value);
              setOptionValue(data.value);
              startProcess(data.value);
            }}
            // onClick={startProcess}
            options={options}
            // placeholder='Выбрать процесс'
            // selection
            value={optionValue}
            item
            simple
          />
        </Menu>
      </div>}
    </div>;
}

// ProcessSelectorContainer.getInitialProps = async function ({query, headers}) {
//   console.log('ProcessSelectorContainer.getInitialProps = async function ( {query, headers}) ', headers);
//     // const processInstanceId = query.processInstanceId;
//     // const activityInstanceId = query.activityInstanceId;
//     const api = new ProcessDefinitionsApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
//     const data = await api.getProcessDefinitions({enabled: true});
//     // const [data, getData] = useResource(() => await api.getWorkList({}));
//     // useEffect(() => {
//     //     getData();
//     // }, []);
//     console.log('data!!!',data);
//     return data;
// };

export default ProcessSelectorContainer;
