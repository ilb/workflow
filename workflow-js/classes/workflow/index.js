import FileDossier from '@ilb/filedossier-js/classes/FileDossier';
import { getProcessInstancesApi } from '../../conf/config';


/* fix url for local development on localhost */
export const fixDevelmentUrl = (urlstr) => {
  if (process.env.NODE_ENV !== 'production') {
    const URL = require('url');
    const urlObj = URL.parse(urlstr);
    return `${urlObj.pathname}${urlObj.search || ''}${urlObj.hash || ''}`;
  }
  return urlstr;
};

export const proceedToNextUrl = (result) => {
  const { response, error } = result || {};
  if (!error) {
    const nextUrl = (response && response.activityFormUrl) || '/workflow/workList';
    if (process.browser) {
      document.location = fixDevelmentUrl(nextUrl);
    } else {
      throw new Error('proceedToNextUrl not allowed on server side');
    }
  }
};


export async function getActivityForm ({ processInstanceId, activityInstanceId, req }) {
  const api = getProcessInstancesApi({ req, proxy: true });
  const activityFormData = await api.getActivityForm1(activityInstanceId, processInstanceId);
  return activityFormData;
}

// creating new process
export async function createProcessInstanceAndNext ({ processDefinitionId, body, req }) {
  const api = getProcessInstancesApi({ req, proxy: true });
  const result = await api.createProcessInstanceAndNext({ processDefinitionId, body: body || {} });
  proceedToNextUrl(result);
  return result;
}

export async function getProcessSteps ({ processInstanceId, req }) {
  const api = getProcessInstancesApi({ req, proxy: true });
  const processSteps = await api.getProcessSteps(processInstanceId);
  return processSteps;
}

export async function goAnywhere ({ processInstanceId, activityDefinitionId, activityInstanceId, req }) {
  const api = getProcessInstancesApi({ req, proxy: true });
  const result = await api.goAnywhere(processInstanceId, { activityDefinitionId, activityInstanceId, body: {} });
  proceedToNextUrl(result);
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
