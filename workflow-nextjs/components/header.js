import Link from 'next/link';
import config from '../conf/config';
// import React, { useState, useEffect, useRef } from 'react';
import React, { useState, useEffect, useRef } from 'react';
import { Message, Loader, Select, Button, Menu } from 'semantic-ui-react'
import { ApiClient, ProcessDefinitionsApi, ProcessInstancesApi } from '@ilb/workflow-api/dist';
import { Dropdown } from 'semantic-ui-react';
import '@bb/semantic-ui-css/semantic.min.css'
import superagent from "superagent";
import './index.css';


const ProcessSelectorContainer = (props) => {
  console.log('ProcessSelectorContainer props', props);
    const errorHandler = (data) => {
        alert(data.error);
    }

    const [{ loading, error }, setSubmitState] = useState({ loading: false, error: null });

    const startProcess = async (optionValue) => {

        if (!optionValue) {
          setSubmitState({ loading: false, error: 'нет данных для отправки' });
        }
        setSubmitState({ loading: true });
        try {
          const res = await superagent.post(process.env.API_PATH + "/createProcessInstanceAndNext") // /api/createProcessInstanceAndNext.js
            .query({processDefinitionId: optionValue})
            .send({});
            // .then(res => document.location=res.headers['x-location'].replace(/https:\/\/devel.net.ilb.ru\/workflow-js/,"http://" + document.location.host));
          if (res && (res.statusText !== "OK" || !res.headers)) {
            // console.log('submitHandler res', res);
            setSubmitState({ loading: false, error: res.status + ' ' + res.statusText });
          } else {
            // console.log('res', res);
            // console.log(res.headers['x-location']);
            setSubmitState({ loading: false });
            document.location=res.headers['x-location'].replace(/https:\/\/devel.net.ilb.ru\/workflow-js/,document.location.origin + "/workflow");
            // document.location = res.headers['x-location'].replace('/workflow-js/', '/workflow/');
          }
        } catch (e) {
          // console.log('e e.message', e, e.message);
          setSubmitState({ loading: false, error: e.status + ' ' + e.message });
          showPopup({ title: 'Ошибка', message: e.status + ' ' + e.message, type: 'error', position: 'tr', autoDismiss: '30' });
        }
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

    const showPopup = props.showPopup;

    console.log('options', options);
    return <div>
      <Dropdown loading={loading}
        // inline
        text='Запустить процесс'
        onChange={(e, data) => {
          // startProcess('');
          startProcess(data.value);
        }}
        options={options}
        value={0}
        selectOnBlur={false}
        selectOnNavigation={false}
        item
        simple
      />
    </div>
}

const linkStyle = {
  marginRight: 15
};

const Header = (props) => {
  // console.log('Header props', props);
  return <div className='fixedMenu'>
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
  // console.log('header.js getProcessDefinitions headers', headers);
  const api = new ProcessDefinitionsApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
  return api.getProcessDefinitions({enabled: true});
}

export default Header;
