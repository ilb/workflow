import { ProcessInstancesApi } from '@ilb/workflow-api/dist';
import config from '../../conf/config';

export default async ({query, headers, body}, res) => {
    console.log('{query, headers, body}, res', {query, headers, body}, res);
    // const processInstanceId = query.processInstanceId;
    // const activityInstanceId = query.activityInstanceId;
    const api = new ProcessInstancesApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
    // const act = await api.completeAndNext(activityInstanceId, processInstanceId, {body});
    // const api = new ProcessInstancesApi(config.workflowApiClient(null));
    const optionValue = 'stockvaluation_fairpricecalc';
    const act = api.createProcessInstanceAndNext({processDefinitionId: optionValue, body:{}})
            .then(act => document.location=act.activityFormUrl.replace(/https:\/\/devel.net.ilb.ru\/workflow-js/,"http://" + document.location.host))
            .catch(errorHandler);

    if (act.activityFormUrl) {
        res.setHeader('X-Location', act.activityFormUrl);
    } else {
        res.setHeader('X-Location', "workList");
    }

    console.log('req:', headers);

    res.statusCode = 200;
    res.end(JSON.stringify({name: 'Nextjs'}));
};
