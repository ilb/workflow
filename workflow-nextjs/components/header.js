import Link from 'next/link';
import { Menu, Icon } from 'semantic-ui-react'
import config from '../conf/config';
// import React, { useState, useEffect, useRef } from 'react';
import React, { useState, useEffect, useRef } from 'react';
import {  Message, Loader, Select, Button } from 'semantic-ui-react'
import { ApiClient, ProcessDefinitionsApi, ProcessInstancesApi } from '@ilb/workflow-api/dist';
import { Dropdown } from 'semantic-ui-react';
import '@bb/semantic-ui-css/semantic.min.css'
import superagent from "superagent";


const ProcessSelectorContainer = (props) => {
    const errorHandler = (data) => {
        alert(data.error);
    }

    const [loading, setLoading] = useState(false);
    const [errorRes, setErrorRes] = useState(null);

    const startProcess = async (optionValue_) => {

        if (!optionValue_) {
          setErrorRes('Что-то пошло не так');
        }
        setLoading(true);

        const res = await superagent.post(process.env.API_PATH + "/createProcessInstanceAndNext") // /api/createProcessInstanceAndNext.js
          .query({processDefinitionId: optionValue_})
          .send({})
          // .then(res => document.location=res.headers['x-location'].replace(/https:\/\/devel.net.ilb.ru\/workflow-js/,"http://" + document.location.host));
        if (res && (res.statusText !== "OK" || !res.headers)) {
          setErrorRes('Что-то пошло не так');
        } else {
          console.log(res.headers['x-location']);
          document.location=res.headers['x-location'].replace(/https:\/\/devel.net.ilb.ru\/workflow-js/,document.location.origin + "/workflow");
          // document.location = res.headers['x-location'].replace('/workflow-js/', '/workflow/');
        }
        setLoading(false);
    };

    //-------------
    const data = props && props.processDefinitions;
    const processDefinitions = data && data.processDefinition;

    const options = [];
    const createOption = (optionData) => {
      return { key: optionData.name, text: optionData.definitionName, value: optionData.id }
    };
    if (processDefinitions) {
      Object.keys(processDefinitions).forEach(el => options.push(createOption(processDefinitions[el])));
    }

    console.log('options', options);
    return !errorRes ? <Dropdown loading={loading}
      // inline
      text='Запустить процесс'
      onChange={(e, data) => {
        startProcess(data.value);
      }}
      options={options}
      value={0}
      selectOnNavigation
      closeOnBlur
      item
      simple
    /> : <Message size='small' negative>{errorRes}</Message>
}

const linkStyle = {
  marginRight: 15
};

const Header = (props) => {
  console.log('Header props', props);
  return <div>
    <Menu style={{ marginBottom: '1.5rem' }}>
        <Menu.Item
          name='Рабочий лист'
          href='/workflow/workList'
        />
        <ProcessSelectorContainer
          {...props}
          />
      </Menu>
  </div>;
};

export function getProcessDefinitions (headers) {
  console.log('header.js getProcessDefinitions headers', headers);
  const api = new ProcessDefinitionsApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
  return api.getProcessDefinitions({enabled: true});
}

export default Header;
