import FileDossier from '@ilb/filedossier-js/classes/FileDossier';
import { getProcessInstancesApi } from '../../conf/config';


/* fix url for local development on localhost */
const fixDevelmentUrl = (urlstr) => {
  if (process.env.NODE_ENV !== 'production') {
    const URL = require('url');
    const urlObj = URL.parse(urlstr);
    return `${urlObj.pathname}${urlObj.search || ''}${urlObj.hash || ''}`;
  }
  return urlstr;
};

const proceedToNextUrl = (response) => {
  if (response) {
    const nextUrl = response.activityFormUrl || '/workflow/workList';
    if (process.browser) {
      document.location = fixDevelmentUrl(nextUrl);
    } else {
      throw new Error('proceedToNextUrl not allowed on server side');
    }
  }
};


export async function getActivityForm ({ processInstanceId, activityInstanceId, req }) {
  const api = getProcessInstancesApi({ req, proxy: true });
  const activityFormData = await api.getActivityForm(activityInstanceId, processInstanceId);
  return activityFormData;
}

// submit form handler - complete activity
export async function completeAndNext ({ processInstanceId, activityInstanceId, processData, req }) {
  const api = getProcessInstancesApi({ req, proxy: true });
  const result = await api.completeAndNext(activityInstanceId, processInstanceId, { body: processData || {} });
  proceedToNextUrl(result.response);
  return result;
}

// creating new process
export async function createProcessInstanceAndNext ({ processDefinitionId, body, req }) {
  const api = getProcessInstancesApi({ req, proxy: true });
  const result = await api.createProcessInstanceAndNext({ processDefinitionId, body: body || {} });
  proceedToNextUrl(result.response);
  return result;
}

export async function getActivityInitialProps ({ query, req }) {
  const props = {};
  const { processInstanceId, activityInstanceId } = query;
  props.activityFormData = await getActivityForm({ processInstanceId, activityInstanceId, req });

  if (props.activityFormData.response && props.activityFormData.response.activityDossier) {
    const dossier = new FileDossier({ ...props.activityFormData.response.activityDossier, req }); // { dossierKey, dossierPackage, dossierCode, req }
    props.dossierData = await dossier.getDossier();
  }
  return props;
}
