import { Table, Header } from 'semantic-ui-react'
import Link from 'next/link';

// <Link route='blog' params={{slug: 'hello-world'}}>
//   <a>Hello world</a>
// </Link>

const ActivityLink = props => {
  const href = `/workflow/activityForm?processInstanceId=${props.processInstanceId}&activityInstanceId=${props.id}`
  // <Link
  // // page="/workflow/activityForm"
  // // params={{query: { processInstanceId: props.processInstanceId, activityInstanceId: props.id}}}
  // // query={{processInstanceId: props.processInstanceId, activityInstanceId: props.id}}
  // href={{ pathname: '/workflow/activityForm', query: { processInstanceId: props.processInstanceId, activityInstanceId: props.id} }}
  // // passHref
  // // target="_blank"
  // >
  // <a>{props.title}</a>
  // </Link>
  return <div>
      <a href={href}>{props.title}</a>
    </div>;
};

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
                  {<ActivityLink title={el && el.name} processInstanceId={el && el.processInstanceId} id={el && el.id}/>}
                  {}
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

export default RenderTable;
