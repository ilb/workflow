import { executeApi } from '@ilb/js-auto-proxy';
import { getProcessInstancesApi } from '../../../../conf/config';

export default async (req, res) => {
  const api = getProcessInstancesApi({ req });
  executeApi(api, req, res);
};
