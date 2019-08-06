// import { ProcessInstancesApi } from '@ilb/workflow-api/dist';
// import config from '../../conf/config';
//
// export default async ({query, headers, body}, res) => {
//     const processInstanceId = query.processInstanceId;
//     const activityInstanceId = query.activityInstanceId;
//     const api = new ProcessInstancesApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
//     const act = await api.completeAndNext(activityInstanceId, processInstanceId, {body});
//
//     if (act.activityFormUrl) {
//         res.setHeader('X-Location', act.activityFormUrl);
//     } else {
//         res.setHeader('X-Location', "workList");
//     }
//
//     console.log('req:', headers);
//
//     res.statusCode = 200;
//     res.end(JSON.stringify({name: 'Nextjs'}));
// };
