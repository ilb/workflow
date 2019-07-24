const context = require('../utils/context');
const workflow_api = require('@ilb/workflow-api');


let certfile, passphrase, cert, ca;

if (!process.browser) {
    certfile = context.lookup('ru.bystrobank.apps.workflow.certfile');
    passphrase = context.lookup('ru.bystrobank.apps.workflow.cert_PASSWORD');
    const fs = require('fs');
    cert = certfile !== null ? fs.readFileSync(certfile) : null;
    ca = process.env.NODE_EXTRA_CA_CERTS ? fs.readFileSync(process.env.NODE_EXTRA_CA_CERTS) : null;

    const applyAuthToRequest = (request, authNames) => {
        request.ca(ca);
        request.key(cert);
        request.cert(cert);
        request._passphrase = passphrase;
    }
    workflow_api.ApiClient.instance.applyAuthToRequest = applyAuthToRequest;
}

workflow_api.ApiClient.instance.basePath = 'https://devel.net.ilb.ru/workflow-web/web/v2';

module.exports = {
    certfile: certfile,
    passphrase: passphrase,
    cert: cert,
    ca: ca,
    user: process.env.USER
};

