import { ProcessInstancesApi, ProcessDefinitionsApi } from '@ilb/workflow-api';
import { createJsProxy } from '@ilb/js-auto-proxy';
require('@ilb/node_context').config({ debug: true });

const workflowApi = require('@ilb/workflow-api');
workflowApi.ApiClient.instance.basePath = 'https://devel.net.ilb.ru/workflow-web/web/v2';

let certfile, passphrase, cert, ca;

if (!process.browser) {
  certfile = process.env['ru.bystrobank.apps.workflow.certfile'];
  passphrase = process.env['ru.bystrobank.apps.workflow.cert_PASSWORD'];
  const fs = require('fs');
  cert = certfile ? fs.readFileSync(certfile) : null;
  ca = process.env.NODE_EXTRA_CA_CERTS ? fs.readFileSync(process.env.NODE_EXTRA_CA_CERTS) : null;
}

const getRemoteUser = req => req && req.headers && req.headers['x-remote-user'];

export function getWorkflowApiClient (xRemoteUser) {
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

export function getProcessInstancesApi ({ req, proxy }) {
  const client = getWorkflowApiClient(getRemoteUser(req));
  let api = new ProcessInstancesApi(client);
  if (proxy) { api = createJsProxy(api, 'workflow/processinstances'); }
  return api;
}

export function getProcessDefinitionsApi ({ req, proxy }) {
  const client = getWorkflowApiClient(getRemoteUser(req));
  let api = new ProcessDefinitionsApi(client);
  if (proxy) { api = createJsProxy(api, 'workflow/processdefinitions'); }
  return api;
}

const config = {
  certfile: certfile,
  passphrase: passphrase,
  cert: cert,
  ca: ca,
};
export default config;
