import { ProcessInstancesApi } from '@ilb/workflow-api';
import FileDossier from '@ilb/filedossier-js/classes/FileDossier';
import config from '../../conf/config';

export default function ActivityFormHandler () {}

ActivityFormHandler.getInitialProps = async function ({ query, req }) {
  const headers = req ? req.headers : {};
  const processInstanceId = query.processInstanceId;
  const activityInstanceId = query.activityInstanceId;
  const api = new ProcessInstancesApi(config.workflowApiClient(headers ? headers['x-remote-user'] : null));
  const activityFormData = await api.getActivityForm(activityInstanceId, processInstanceId);
  const props = { activityFormData };

  if (activityFormData.activityDossier) {
    const dossier = new FileDossier({ ...activityFormData.activityDossier, req }); // { dossierKey, dossierPackage, dossierCode, req }
    props.dossierData = await dossier.getDossier();
  }
  return props;
};
