import WorkflowResource from '../../classes/workflow/WorkflowResource';

export default async (req, res) => {
    const resource = new WorkflowResource();
    resource.callApi(req, res);
};
