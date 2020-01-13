import { ApiClient as WorkflowApiClient, ProcessInstancesApi, ProcessDefinitionsApi } from '@ilb/workflow-api';
import ContextFactory from '@ilb/node_context';
import { createJsProxy } from '@ilb/js-auto-proxy';

let certfile, passphrase, cert, ca;
let workflowWS;
let paramsloaded = false;
let initialized = false;

function fillparams () {
  if (!process.browser && !paramsloaded) {
    // auth params
    certfile = process.env['ru.bystrobank.apps.workflow.certfile'];
    passphrase = process.env['ru.bystrobank.apps.workflow.cert_PASSWORD'];
    const fs = require('fs');
    cert = certfile ? fs.readFileSync(certfile) : null;
    ca = process.env.NODE_EXTRA_CA_CERTS ? fs.readFileSync(process.env.NODE_EXTRA_CA_CERTS) : null;

    // web services
    workflowWS = process.env['ru.bystrobank.apps.workflow.ws'];

    paramsloaded = true;
  }
}

const getRemoteUser = req => req && req.headers && req.headers['x-remote-user'];

export function getWorkflowApiClient (xRemoteUser) {
  const apiClient = new WorkflowApiClient();
  fillparams();
  apiClient.basePath = `${workflowWS}/v2`; // IMPORTANT: server side only (or via createJsProxy)
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
  if (proxy) { api = createJsProxy(api, 'proxies/workflow/processinstances'); }
  return api;
}

export function getProcessDefinitionsApi ({ req, proxy }) {
  const client = getWorkflowApiClient(getRemoteUser(req));
  let api = new ProcessDefinitionsApi(client);
  if (proxy) { api = createJsProxy(api, 'proxies/workflow/processdefinitions'); }
  return api;
}

async function init () {
  if (!process.browser && !initialized) {
    const cf = new ContextFactory();
    await cf.build();
    fillparams();
    initialized = true;
  }
}

const config = {
  init,
  certfile: certfile,
  passphrase: passphrase,
  cert: cert,
  ca: ca,
};
export default config;
