import { createDossierApi } from '@ilb/filedossier-js/conf/config';
import { executeApi } from '@ilb/filedossier-js/classes/jsApiAutoProxy';

export default async (req, res) => {
  const apiDossier = createDossierApi((req && req.headers) ? req.headers['x-remote-user'] : null);
  executeApi(apiDossier, req, res);
};
