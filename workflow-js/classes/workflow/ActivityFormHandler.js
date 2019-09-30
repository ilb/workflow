import DossierHandler from './DossierHandler';
import config from '../../conf/config';
import { ProcessInstancesApi } from '@ilb/workflow-api';

export default function ActivityFormHandler() {

}

ActivityFormHandler.getInitialProps = async function (params) {
    const {query, req} = params;
    const headers = req ? req.headers : {};
    const processInstanceId = query.processInstanceId;
    const activityInstanceId = query.activityInstanceId;
    const api = new ProcessInstancesApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
    const activityFormData = await api.getActivityForm(activityInstanceId, processInstanceId);

    const props = {activityFormData};
    let propsDossier = {};

    if (activityFormData.activityDossier) {
        propsDossier = await DossierHandler.getInitialProps({query: activityFormData.activityDossier, req});
    }
    return {...props, ...propsDossier};
}
