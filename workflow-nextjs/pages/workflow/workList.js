import React, { useState, useEffect, useRef } from 'react';
import { Message, Loader, Select, Button, Header as HeaderUI, Icon } from 'semantic-ui-react'
import { ProcessInstancesApi, ProcessDefinitionsApi } from '@ilb/workflow-api/dist';
import { Table } from 'semantic-ui-react';
import config from '../../conf/config';
import '@bb/semantic-ui-css/semantic.min.css'

import Layout from '../../components/layout'
import { getProcessDefinitions } from '../../components/header'
// import RenderTable from '../../components/RenderTable'
import dynamic from 'next/dynamic'

const RenderTable = dynamic(
  () => import('../../components/RenderTable'),
  { loading: () => <p>loading...</p> }
)

const WorkList = (props) => {

  const _data = props && props.data.activityInstance;
  const loading = props && props.loading;
  // console.log('_data', _data);
  return <Layout {...props}>
    <div>
      {!_data && <p>данные отсутствуют</p>}
      {_data && <RenderTable activityInstance={_data}/>}
  </div></Layout>;
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

WorkList.getInitialProps = async function ({req}) {
    const headers = req ? req.headers : {};
    const api = new ProcessInstancesApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
    const data = await api.getWorkList({});
    data.activityInstance && data.activityInstance.forEach(activity => {
      activity.creationTime = dateToString(activity.creationTime);
      activity.lastStateTime = dateToString(activity.lastStateTime);
    });
    console.log('WorkList.getInitialProps headers', headers);
    const processDefinitions = await getProcessDefinitions(headers);
    console.log('WorkList.getInitialProps processDefinitions', processDefinitions);

    return { data, processDefinitions };
};

export default WorkList;
