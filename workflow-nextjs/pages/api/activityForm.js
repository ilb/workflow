import { ApiClient as WorkflowApiClient, DefaultApi as WorkflowApi} from '@ilb/workflow-api/dist';
import config from '../../conf/config';

export default async (req, res) => {
    const processInstanceId = req.query.processInstanceId;
    const activityInstanceId = req.query.activityInstanceId;
    const data = await new WorkflowApi().completeAndNext(activityInstanceId, processInstanceId, {body: req.body,xRemoteUser: req.headers ? req.headers['x-remote-user'] : config.user});
            

    //console.log('req:', req);
    res.setHeader('Content-Type', 'application/json');
    res.statusCode = 200;
    res.end(JSON.stringify({name: 'Nextjs'}));
};
