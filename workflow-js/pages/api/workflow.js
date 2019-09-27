import WorkflowResource from '../../classes/workflow/WorkflowResource';
import config from '../../conf/config';

export default async (req, res) => {
    const apiClient = config.workflowApiClient(req.headers ? req.headers['x-remote-user'] : null)
    const resource = new WorkflowResource(apiClient);
    resource.callApi(req, res);
};
