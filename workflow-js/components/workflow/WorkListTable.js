import { ProcessInstancesApi } from '@ilb/workflow-api';
import PropTypes from 'prop-types';
import config from '../../conf/config';
import { Table, Header } from 'semantic-ui-react';
// import Link from 'next/link';

export default function WorkListTable ({ workList }) {
  const activityInstanceData = workList && workList.activityInstance;
  return (
    <div>
      <Header as='h3' icon textAlign='center'>
        <Header.Content>Рабочий лист</Header.Content>
      </Header>
      <Table striped celled>
        <Table.Header>
          <Table.Row>
            <Table.HeaderCell>Этап</Table.HeaderCell>
            <Table.HeaderCell collapsing>Создан</Table.HeaderCell>
            <Table.HeaderCell collapsing>Изменен</Table.HeaderCell>
            <Table.HeaderCell collapsing><a title = "Приоритет"> П </a></Table.HeaderCell>
            <Table.HeaderCell>Состояние</Table.HeaderCell>
          </Table.Row>
        </Table.Header>
        <Table.Body>
          {activityInstanceData && Object.values(activityInstanceData).map((activity, index) => (
            <Table.Row key={index}>
              <Table.Cell>
                <a href={activity.activityFormUrl}>{activity.name}</a>
                <div>{activity.description}</div>
              </Table.Cell>
              <Table.Cell collapsing>{activity.creationTime}</Table.Cell>
              <Table.Cell collapsing>{activity.lastStateTime}</Table.Cell>
              <Table.Cell collapsing>{activity.priority}</Table.Cell>
              <Table.Cell>{activity.state && activity.state.name}</Table.Cell>
            </Table.Row>
          ))}
        </Table.Body>
      </Table>
    </div>
  );
}

WorkListTable.propTypes = {
  workList: PropTypes.object.isRequired,
};

WorkListTable.getInitialProps = async function ({ req }) {
  const headers = req ? req.headers : {};
  const api = new ProcessInstancesApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
  const workList = await api.getWorkList({});
  // convert dates
  workList.activityInstance && workList.activityInstance.forEach(activity => {
    activity.creationTime = dateToString(activity.creationTime);
    activity.lastStateTime = dateToString(activity.lastStateTime);
  });
  return { workList };
};

function dateToString (date) {
  if (!date) { return date; }
  const yyyy = date.getFullYear();
  const mm = `0${date.getMonth() + 1}`.slice(-2);
  const dd = `0${date.getDate()}`.slice(-2);
  const hh = `0${date.getHours()}`.slice(-2);
  const min = `0${date.getMinutes()}`.slice(-2);
  const ss = `0${date.getSeconds()}`.slice(-2);
  return `${dd}.${mm}.${yyyy} ${hh}:${min}:${ss}`;
}
