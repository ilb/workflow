import React, { useState, useEffect, useRef } from 'react';
import { Dropdown } from 'semantic-ui-react';
import superagent from "superagent";
import config from '../../conf/config';
import { ApiClient, ProcessDefinitionsApi, ProcessInstancesApi } from '@ilb/workflow-api';

const ProcessSelector = (props) => {
    // console.log('ProcessSelectorContainer props', props);

    const [{loading, error}, setSubmitState] = useState({loading: false, error: null});

    const startProcess = async (optionValue) => {

        if (!optionValue) {
            setSubmitState({loading: false, error: 'нет данных для отправки'});
        }
        setSubmitState({loading: true});
        try {
            const res = await superagent.post(process.env.API_PATH + "/createProcessInstanceAndNext") // /api/createProcessInstanceAndNext.js
                    .query({processDefinitionId: optionValue})
                    .send({});
            // .then(res => document.location=res.headers['x-location'].replace(/https:\/\/devel.net.ilb.ru\/workflow-js/,"http://" + document.location.host));
            if (res && (res.statusText !== "OK" || !res.headers)) {
                setSubmitState({loading: false, error: res.status + ' ' + res.statusText});
            } else {
                setSubmitState({loading: false});
                document.location = res.headers['x-location'].replace(/https:\/\/devel.net.ilb.ru\/workflow-js/, document.location.origin + "/workflow");
                // document.location = res.headers['x-location'].replace('/workflow-js/', '/workflow/');
            }
        } catch (e) {
            setSubmitState({loading: false, error: e.status + ' ' + e.message});
            showPopup({title: 'Ошибка при запуске процесса', message: e.status + ' ' + e.message, type: 'error', position: 'tr', autoDismiss: '30'});
        }
    };

    //-------------
    const data = props && props.processDefinitions;
    const processDefinitions = data && data.processDefinition;

    const options = [];
    const createOption = (optionData) => {
        return {key: optionData.name, text: optionData.definitionName, value: optionData.id}
    };
    if (processDefinitions) {
        Object.keys(processDefinitions).forEach(el => options.push(createOption(processDefinitions[el])));
    }

    const showPopup = props.showPopup;

    return <Dropdown loading={loading}
              // inline
              text='Запустить процесс'
              selectOnBlur={false}
              selectOnNavigation={false}
              item
              simple
              closeOnChange={true}
              >
              <Dropdown.Menu>
            {options && options.map((option) => (
                        <Dropdown.Item
                            key={option.key}
                            text={option.text}
                            onClick={(e, data) => {
                                            startProcess(option.value);
                                        }}
                            />
                                ))}
        </Dropdown.Menu>
    </Dropdown>
}
ProcessSelector.getInitialProps = async function ( {query, req}) {
    const headers = req ? req.headers : {};
    const api = new ProcessDefinitionsApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
    const processDefinitions = await api.getProcessDefinitions({enabled: true});
    return {processDefinitions};
};


export default ProcessSelector;
