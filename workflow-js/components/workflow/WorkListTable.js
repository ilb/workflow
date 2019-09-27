import React, { useState, useEffect, useRef } from 'react';
import { Message, Loader, Select, Button, Header as HeaderUI, Icon } from 'semantic-ui-react';
import { ProcessInstancesApi, ProcessDefinitionsApi } from '@ilb/workflow-api';
import config from '../../conf/config';
import '@bb/semantic-ui-css/semantic.min.css';
import { Table, Header } from 'semantic-ui-react';
import Link from 'next/link';
function ActivityLink(props) {
    const href = `/workflow/activityForm?processInstanceId=${props.processInstanceId}&activityInstanceId=${props.id}`
    return <div>
        <a href={href}>{props.title}</a>
    </div>;
}

export default function WorkListTable( {workList}) {
    const activityInstanceData = workList && workList.activityInstance;
    const html =
            <div>
                <Header as='h3' icon textAlign='center'>
                    <Header.Content>Рабочий лист</Header.Content>
                </Header>
                <Table striped celled>
                    <Table.Header>
                        <Table.Row>
                            <Table.HeaderCell>Этап</Table.HeaderCell>
                            <Table.HeaderCell>Создан</Table.HeaderCell>
                            <Table.HeaderCell>Изменен</Table.HeaderCell>
                            <Table.HeaderCell><a title = "Приоритет"> П </a></Table.HeaderCell >
                            <Table.HeaderCell>Состояние</Table.HeaderCell>
                        </Table.Row>
                    </Table.Header>
                    <Table.Body>
                        {activityInstanceData && Object.values(activityInstanceData).map((el, index) => (
                                <Table.Row key={index}>
                                    <Table.Cell>
                                        <ActivityLink title = {el && el.name} processInstanceId = {el && el.processInstanceId} id = {el && el.id} />
                                    </Table.Cell>
                                    <Table.Cell>{el.creationTime}</Table.Cell>
                                    <Table.Cell>{el.lastStateTime}</Table.Cell>
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


WorkListTable.getInitialProps = async function (params) {
    const {query, req} = params;
    const headers = req ? req.headers : {};
    const api = new ProcessInstancesApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
    const workList = await api.getWorkList({});
    workList.activityInstance && workList.activityInstance.forEach(activity => {
        activity.creationTime = dateToString(activity.creationTime);
        activity.lastStateTime = dateToString(activity.lastStateTime);
    });
    const props = {workList};
    return props;
};

function dateToString(d)
{
    // DD.MM.YYYY
    let datestring = d;
    let datestring0 = null;
    if (d) {
        try {
            datestring0 = ("0" + d.getDate()).slice(-2) + "." + ("0" + (d.getMonth() + 1)).slice(-2) + "." +
                    d.getFullYear() + " " + ("0" + d.getHours()).slice(-2) + ":" + ("0" + d.getMinutes()).slice(-2);
        } catch (err) {
            console.log('d err', d, err);
            datestring0 = null;
        }
    }
    datestring = datestring0;
    return datestring || d; // 11.11.2022 09:50
}

