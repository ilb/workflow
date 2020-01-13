import { executeApi } from '@ilb/js-auto-proxy';
import { getProcessDefinitionsApi } from '../../../../conf/config';

export default async (req, res) => {
  const api = getProcessDefinitionsApi({ req });
  executeApi(api, req, res);
};
