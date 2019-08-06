import React, { useState, useEffect, useRef } from 'react';
import { Message, Loader, Select, Button, Header, Icon } from 'semantic-ui-react'
import { ProcessInstancesApi } from '@ilb/workflow-api/dist';
// import  from '@ilb/workflow-api/dist';
import {useResource} from '../api/ReactHelper';
import { Table } from 'semantic-ui-react';
// console.log('DefaultApi', DefaultApi);
// import { ProcessInstancesApi } from '@ilb/workflow-api/dist';
import config from '../../conf/config';
import '@bb/semantic-ui-css/semantic.min.css'

// console.log('Table', Table);

// const DefaultApi = require('@ilb/workflow-api/dist');

// function WorkList() {
const WorkList = (props) => {
  console.log('WorkList props', props);
  // const api = new ProcessInstancesApi();
  // const api = new ProcessInstancesApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
  const _data = props && props.pageProps && props.pageProps.activityInstance;
  // console.log('_data', _data);
  // const [data, getData] = useResource(() => api.getWorkList({}));
  // useEffect(() => {
  //     getData();
  // }, []);
  return <div>
      {!_data && <p>данные отсутствуют</p>}
      {_data && <RenderTable activityInstance={_data}/>}
  </div>;
}

const dateToString = (d) => {
  // DD.MM.YYYY
  let datestring = d;
  let datestring0 = null;
  if (d) {
    try {
      datestring0 = ("0" + d.getDate()).slice(-2) + "." + ("0"+(d.getMonth()+1)).slice(-2) + "." +
      d.getFullYear() + " " + ("0" + d.getHours()).slice(-2) + ":" + ("0" + d.getMinutes()).slice(-2);
    } catch (err) {
      console.log('d err', d, err);
      datestring0 = null;
    }
  }
  datestring = datestring0;
  return datestring || d; // 11.11.2022 09:50
  // return d; // 11.11.2022 09:50
}

const RenderTable = (activityInstance) => {
  // console.log('activityInstance', activityInstance);
  // const activityInstanceData = activityInstance && activityInstance.activityInstance.activityInstance;
  const activityInstanceData = activityInstance && activityInstance.activityInstance;
  // const activityInstanceData = activityInstance;
  const html =
    <div>
    <Header as='h3' icon textAlign='center'>
      {/* <Icon name='barcode' /> */}
      <Header.Content>Рабочий лист</Header.Content>
    </Header>
      <Table striped celled>
        <Table.Header>
          <Table.Row>
            <Table.HeaderCell>{<a title={'processInstanceId'}>ID</a>}</Table.HeaderCell>
            <Table.HeaderCell>Этап</Table.HeaderCell>
            <Table.HeaderCell>Создан</Table.HeaderCell>
            <Table.HeaderCell>Изменен</Table.HeaderCell>
            <Table.HeaderCell>{<a title={'Приоритет'}>П</a>}</Table.HeaderCell>
            <Table.HeaderCell>Состояние</Table.HeaderCell>
          </Table.Row>
        </Table.Header>

        <Table.Body>
          {activityInstanceData && Object.values(activityInstanceData).map((el,index) => (
            <Table.Row key={index}>
              <Table.Cell>
                {<a
                  title={el.processInstanceId}
                  href={`https://devel.net.ilb.ru/workflow-web/web/processes/${el.processInstanceId}?xpilprop=FILL_PROCESS_VARIABLES&xpilprop=FILL_RUNNING_ACTIVITIES&xpilprop=FILL_ACTIVITY_DEADLINE_INFO`}
                  target="_blank"
                >{el.processInstanceId && el.processInstanceId.split('_')[0]}</a>}
              </Table.Cell>
              <Table.Cell>
                <a
                  href={`https://devel.net.ilb.ru/workflow-web/web/processes/${el.processInstanceId}/activities/${el.id}`}
                  target="_blank"
                >
                  {el && el.name}
                </a>
              </Table.Cell>
              <Table.Cell>{dateToString(el.creationTime)}</Table.Cell>
              <Table.Cell>{dateToString(el.lastStateTime)}</Table.Cell>
              <Table.Cell>{el.priority}</Table.Cell>
              <Table.Cell>{el.state && el.state.name}</Table.Cell>
            </Table.Row>
          )
          )}
        </Table.Body>
      </Table>
    </div>
  return html;
}

WorkList.getInitialProps = async function ({query, headers}) {
  // console.log('WorkList.getInitialProps = async function ( {query, headers}) ', headers);
    // const processInstanceId = query.processInstanceId;
    // const activityInstanceId = query.activityInstanceId;
    // console.log('config.workflowApiClient(headers ? headers[] : null)', config.workflowApiClient(headers ? headers['x-remote-user'] : null));
    const api = new ProcessInstancesApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
    const data = await api.getWorkList({});
    return data;
};

export default WorkList;
