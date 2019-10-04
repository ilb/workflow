require('@ilb/node_context').config({ debug: true });
const workflowApi = require('@ilb/workflow-api');

let certfile, passphrase, cert, ca;

if (!process.browser) {
  certfile = process.env['ru.bystrobank.apps.workflow.certfile'];
  passphrase = process.env['ru.bystrobank.apps.workflow.cert_PASSWORD'];
  const fs = require('fs');
  cert = certfile ? fs.readFileSync(certfile) : null;
  ca = process.env.NODE_EXTRA_CA_CERTS ? fs.readFileSync(process.env.NODE_EXTRA_CA_CERTS) : null;
}

function workflowApiClient (xRemoteUser) {
  const apiClient = new workflowApi.ApiClient();
  apiClient.basePath = 'https://devel.net.ilb.ru/workflow-web/web/v2';
  if (!process.browser) {
    apiClient.applyAuthToRequest = (request/* , authNames */) => {
      request.ca(ca).key(cert).cert(cert);
      request._passphrase = passphrase;
      request.set('x-remote-user', xRemoteUser || process.env.USER);
    };
  }
  return apiClient;
}

workflowApi.ApiClient.instance.basePath = 'https://devel.net.ilb.ru/workflow-web/web/v2';

module.exports = {
  certfile: certfile,
  passphrase: passphrase,
  cert: cert,
  ca: ca,
  workflowApiClient: workflowApiClient,
};
