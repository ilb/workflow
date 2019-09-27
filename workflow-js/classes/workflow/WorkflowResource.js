import { ProcessInstancesApi } from '@ilb/workflow-api';

/**
 * Workflow API handler
 */
export default class WorkflowResource {

    constructor(apiClient) {
        this.processInstancesApi = new ProcessInstancesApi(apiClient);
    }

    async callApi(req, res) {
        const method = req.query.method;
        this[method](req, res);
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
        const act = await this.processInstancesApi.completeAndNext(activityInstanceId, processInstanceId, {body});
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
        const act = await this.processInstancesApi.createProcessInstanceAndNext({processDefinitionId, body});
        if (act.activityFormUrl) {
            res.setHeader('X-Location', act.activityFormUrl);
        } else {
            res.setHeader('X-Location', "workList");
        }
        res.statusCode = 200;
        res.end(JSON.stringify({}));
    }
}
