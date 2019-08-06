import Link from 'next/link';
import { Menu, Icon } from 'semantic-ui-react'
// import ProcessSelectorContainer from './processSelector2'
import dynamic from 'next/dynamic'
// import { ApiClient, ProcessDefinitionsApi, ProcessInstancesApi } from '@ilb/workflow-api/dist';
import config from '../../conf/config';
// import { useResource } from '../api/ReactHelper';
// import React, { useState, useEffect, useRef } from 'react';
// const ProcessSelectorContainer = dynamic(() => import('./processSelector'))
import React, { useState, useEffect, useRef } from 'react';
import {  Message, Loader, Select, Button } from 'semantic-ui-react'
// import { ApiClient, DefaultApi } from '@ilb/workflow-api/dist';
import { ApiClient, ProcessDefinitionsApi, ProcessInstancesApi } from '@ilb/workflow-api/dist';
import { useResource } from '../api/ReactHelper';
import { Dropdown } from 'semantic-ui-react';
import '@bb/semantic-ui-css/semantic.min.css'
// import config from '../../conf/config';


const ProcessSelectorContainer = (props) => {
  // console.log('props', props);
    // const api2 = new ProcessDefinitionsApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
    //
    // const [data, getData] = useResource(() => api2.getProcessDefinitions({enabled: true}));
    // console.log('data, getData', data, getData);
    // useEffect(() => {
    //     getData();
    // }, []);
    //
    // const api = new ProcessInstancesApi(config.workflowApiClient(null));

    //--------------
    const errorHandler = (data) => {
        alert(data.error);
    }

    const startProcess = (optionValue_) => {
      console.log('optionValue', optionValue || optionValue_);
      // const api = new ProcessInstancesApi(config.workflowApiClient(null));
      const api = new ProcessInstancesApi(config.workflowApiClient(null));

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
    // const processDefinition = data && data.processDefinition;
    const data = props && props.props && props.props.pageProps && props.props.pageProps.data;
    // console.log('data!', data);
    const processDefinition = data && data.processDefinition;
    // console.log('processDefinition', processDefinition);
    const options = [];
    const createOption = (optionData) => {
      return { key: optionData.name, text: optionData.definitionName, value: optionData.id }
    };
    if (processDefinition) {
      Object.keys(processDefinition).forEach(el => options.push(createOption(processDefinition[el])));
    }
    // console.log('options', options);

    const [optionValue, setOptionValue] = useState(null);

    return <div className="processSelectorContainer">
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

const linkStyle = {
  marginRight: 15
};

const PostLink = props => (
  <li>
    <Link href="/workflow/[id]" as={`/workflow/${props.id}`}>
      <a>{props.titel}</a>
    </Link>
  </li>
);

// <Menu.Item
//   name='TEST PROCESS'
//   href='/processInstances/5801_stockvaluation_stockvaluation_fairpricecalc/activityInstances/8302_5801_stockvaluation_stockvaluation_fairpricecalc_stockvaluation_fairpricecalc_input/activityForm'
// />
// <Menu.Item
//   name='TEST PROCESS2'
//   href='/processInstances/5602_stockvaluation_stockvaluation_fairpricecalc/activityInstances/8008_5602_stockvaluation_stockvaluation_fairpricecalc_stockvaluation_fairpricecalc_check/activityForm'
// />


const Header = (props) => {
  // const api = new ProcessDefinitionsApi(config.workflowApiClient(null));
  //
  // const [data, getData] = useResource(() => api.getProcessDefinitions({enabled: true}));
  // // const [data, getData] = useState(api2.getProcessDefinitions({enabled: true}));
  // // const [data, getData] = useResource(() => api.getProcessDefinitions({}));
  // console.log('header.js data, getData', data, getData);
  // useEffect(() => {
  //   getData();
  // }, []);
  return <div>
    <Menu style={{ marginBottom: '1.5rem' }}>
        <Menu.Item
          href='/'
        >
          <Icon name='home' />
        </Menu.Item>
        <Menu.Item
          name='TEST PROCESS'
          href='/processInstances/5801_stockvaluation_stockvaluation_fairpricecalc/activityInstances/8302_5801_stockvaluation_stockvaluation_fairpricecalc_stockvaluation_fairpricecalc_input/activityForm'
        />
        <Menu.Item
          name='TEST PROCESS2'
          href='/processInstances/5602_stockvaluation_stockvaluation_fairpricecalc/activityInstances/8008_5602_stockvaluation_stockvaluation_fairpricecalc_stockvaluation_fairpricecalc_check/activityForm'
        />
        <Menu.Item
          name='TEST PROCESS $'
          href='/processInstances/5602_stockvaluation_stockvaluation_fairpricecalc/activityInstances/8008_5602_stockvaluation_stockvaluation_fairpricecalc_stockvaluation_fairpricecalc_check/activityForm'
        />
        <Menu.Item
          name='Activity Form'
          href='/workflow/activityForm'
        />
        <Menu.Item
          name='Рабочий лист'
          href='/workflow/worklist'
        />
        <Menu.Item
          name='Запустить процесс'
          href='/workflow/processSelector'
        />
        <ProcessSelectorContainer
          props={props}
          />
      </Menu>
  </div>;
};

export default Header;
