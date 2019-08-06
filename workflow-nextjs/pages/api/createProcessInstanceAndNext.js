//
// const startProcess = (optionValue_) => {
//   console.log('optionValue', optionValue || optionValue_);
//   // alert(optionValue);
//   // "stockvaluation_fairpricecalc"
//     if (!(optionValue || optionValue_)) {
//       alert('Процесс не выбран');
//       return false;
//     }
//     api.createProcessInstanceAndNext({processDefinitionId: optionValue || optionValue_, body:{}})
//         .then(act => document.location=act.activityFormUrl.replace(/https:\/\/devel.net.ilb.ru\/workflow-js/,"http://" + document.location.host))
//         .catch(errorHandler);
// }
import { ProcessInstancesApi } from '@ilb/workflow-api/dist';
import config from '../../conf/config';

export default async ({query, headers, body}, res) => {
    const processDefinitionId = query.processDefinitionId;
    const api = new ProcessInstancesApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
    const act = await api.createProcessInstanceAndNext(processDefinitionId, {body});

    if (act.activityFormUrl) {
        res.setHeader('X-Location', act.activityFormUrl);
    } else {
        res.setHeader('X-Location', "workList");
    }

    console.log('req:', headers);

    res.statusCode = 200;
    res.end(JSON.stringify({name: 'Nextjs'}));
};
