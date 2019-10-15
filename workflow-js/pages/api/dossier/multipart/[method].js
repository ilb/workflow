import { createDossierApi } from '@ilb/filedossier-js/conf/config';
import { executeFileApi } from '@ilb/js-auto-proxy';

export default async (req, res) => {
  const apiDossier = createDossierApi((req && req.headers) ? req.headers['x-remote-user'] : null);
  executeFileApi(apiDossier, req, res);
};

export const config = {
  api: {
    bodyParser: false,
  },
};
