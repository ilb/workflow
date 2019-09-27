import { ProcessInstancesApi } from '@ilb/workflow-api';
require('url').URL

/**
 * Workflow API handler
 */
export default class WorkflowResource {

    constructor(apiClient) {
        this.processInstancesApi = new ProcessInstancesApi(apiClient);
    }

    async execute(req, res) {
        const method = req.query.method;
        this[method](req, res);
    }

    /**
     * fix url for local development on localhost
     */
    fixDevelmentUrl(urlstr) {
        if (process.env.NODE_ENV !== 'production') {
            var URL = require('url').URL;
            let url = new URL(urlstr)
            return url.pathname + url.search + url.hash;
        }
        return urlstr;
    }
    /**
     * Complete activity and get next activity
     * @param {type} req
     * @param {type} res
     * @returns {undefined}
     */
    async completeAndNext(req, res) {
        //console.log('req',req);
        const {query, headers, body} = req;
        const processInstanceId = query.processInstanceId;
        const activityInstanceId = query.activityInstanceId;
        const act = await this.processInstancesApi.completeAndNext(activityInstanceId, processInstanceId, {body});
        if (act && act.activityFormUrl) {
            res.setHeader('X-Location', this.fixDevelmentUrl(act.activityFormUrl));
        } else {
            res.setHeader('X-Location', "/workflow/workList");
        }
        res.statusCode = 200;
        res.end(JSON.stringify(act || {}));
    }

    /**
     * Create process and get next activity
     * @param {type} req
     * @param {type} res
     * @returns {undefined}\
     */
    async createProcessInstanceAndNext(req, res) {
        //console.log('req', req);
        const {query, headers, body} = req;
        const processDefinitionId = query.processDefinitionId;
        const act = await this.processInstancesApi.createProcessInstanceAndNext({processDefinitionId, body});
        if (act && act.activityFormUrl) {
            res.setHeader('X-Location', this.fixDevelmentUrl(act.activityFormUrl));
        } else {
            res.setHeader('X-Location', "/workflow/workList");
        }
        res.statusCode = 200;
        res.end(JSON.stringify(act || {}));
    }
}
