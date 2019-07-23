import {lookup} from '../utils/context';
import { ApiClient as WorkflowApiClient, DefaultApi as WorkflowApi} from '@ilb/workflow-api/dist';

WorkflowApiClient.instance.basePath = '/workflow-web/web/v2';
if (!process.browser) {
    WorkflowApiClient.instance.basePath = 'https://devel.net.ilb.ru/workflow-web/web/v2';
    const certfile = lookup('ru.bystrobank.apps.workflow.certfile');
    const passphrase = lookup('ru.bystrobank.apps.workflow.cert_PASSWORD');
    const fs = require('fs');
    const cert = fs.readFileSync(certfile);
    const ca = fs.readFileSync(process.env.NODE_EXTRA_CA_CERTS);
    const user = process.env.REMOTE_USER ||  process.env.USER;

    WorkflowApiClient.instance.applyAuthToRequest = (request, authNames) => {
        request.ca(ca);
        request.key(cert);
        request.cert(cert);
        request._passphrase = passphrase;
        request.set('X-Remote-User', user );
    };
}