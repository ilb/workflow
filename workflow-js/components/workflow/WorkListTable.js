import PropTypes from 'prop-types';
import { getProcessInstancesApi } from '../../conf/config';
import { Table, Header, Message } from 'semantic-ui-react';
// import Link from 'next/link';

export default function WorkListTable ({ workList }) {
  const { response, error } = workList;
  const activityInstances = response && response.activityInstance;
  return (
    <div>
      <Header as='h3' icon textAlign='center'>
        <Header.Content>Рабочий лист</Header.Content>
      </Header>
      {error && <Message error visible header="Ошибка при получении данных рабочего листа" content={error}/>}
      {response && !error && <Table striped celled>
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
          {(activityInstances || []).map((activity, index) => (
            <Table.Row key={index}>
              <Table.Cell>
                <a href={activity.activityFormUrl}>{activity.name}</a>
                <div>{activity.description}</div>
              </Table.Cell>
              <Table.Cell collapsing>{dateToString(activity.creationTime)}</Table.Cell>
              <Table.Cell collapsing>{dateToString(activity.lastStateTime)}</Table.Cell>
              <Table.Cell collapsing>{activity.priority}</Table.Cell>
              <Table.Cell>{activity.state && activity.state.name}</Table.Cell>
            </Table.Row>
          ))}
        </Table.Body>
      </Table>}
    </div>
  );
}

WorkListTable.propTypes = {
  workList: PropTypes.object.isRequired,
};

WorkListTable.getInitialProps = async function ({ req }) {
  const api = getProcessInstancesApi({ req, proxy: true });
  const workList = await api.getWorkList({});
  return { workList };
};

function dateToString (date) {
  if (!date) { return date; }
  date = new Date(date);
  const yyyy = date.getFullYear();
  const mm = `0${date.getMonth() + 1}`.slice(-2);
  const dd = `0${date.getDate()}`.slice(-2);
  const hh = `0${date.getHours()}`.slice(-2);
  const min = `0${date.getMinutes()}`.slice(-2);
  const ss = `0${date.getSeconds()}`.slice(-2);
  return `${dd}.${mm}.${yyyy} ${hh}:${min}:${ss}`;
}
