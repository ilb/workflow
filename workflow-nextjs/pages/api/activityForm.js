import { ApiClient as WorkflowApiClient, DefaultApi as WorkflowApi} from '@ilb/workflow-api/dist';

export default (req, res) => {
    console.log('req:', req);
    res.setHeader('Content-Type', 'application/json');
    res.statusCode = 200;
    res.end(JSON.stringify({name: 'Nextjs'}));
};
