import { createDossierApi } from '@ilb/filedossier-js/lib/conf/config';
import { executeApi } from '@ilb/js-auto-proxy';

export default async (req, res) => {
  const apiDossier = createDossierApi((req && req.headers) ? req.headers['x-remote-user'] : null);
  executeApi(apiDossier, req, res);
};
