import { ProcessInstancesApi } from '@ilb/workflow-api';
import config from '../../conf/config';

export default class WorkflowResource {

    async callApi(req, res) {
        const method = req.query.method;
        this[method](req,res);
    }

    /**
     * Complete activity and get next activity
     * @param {type} req
     * @param {type} res
     * @returns {undefined}
     */
    async completeAndNext(req, res) {
        const {query, headers, body} = req;
        const processInstanceId = query.processInstanceId;
        const activityInstanceId = query.activityInstanceId;
        const api = new ProcessInstancesApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
        // console.log('api/activityForm api', api);
        const act = await api.completeAndNext(activityInstanceId, processInstanceId, {body});

        if (act && act.activityFormUrl) {
            res.setHeader('X-Location', act.activityFormUrl);
        } else {
            res.setHeader('X-Location', "/workflow/workList");
        }

        res.statusCode = 200;
        res.end(JSON.stringify({}));

    }

    /**
     * Create process and get next activity
     * @param {type} req
     * @param {type} res
     * @returns {undefined}\
     */
    async createProcessInstanceAndNext(req, res) {
        const {query, headers, body} = req;
        const processDefinitionId = query.processDefinitionId;
        const api = new ProcessInstancesApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
        const act = await api.createProcessInstanceAndNext({processDefinitionId, body});

        if (act.activityFormUrl) {
            res.setHeader('X-Location', act.activityFormUrl);
        } else {
            res.setHeader('X-Location', "workList");
        }


        res.statusCode = 200;
        res.end(JSON.stringify({}));

    }
}
