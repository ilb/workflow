const context = require('../utils/context');

let certfile, passphrase, cert, ca;

if (!process.browser) {
    certfile = context.lookup('ru.bystrobank.apps.workflow.certfile');
    passphrase = context.lookup('ru.bystrobank.apps.workflow.cert_PASSWORD');
    const fs = require('fs');
    cert = certfile !== null ? fs.readFileSync(certfile) : null;
    ca = process.env.NODE_EXTRA_CA_CERTS ? fs.readFileSync(process.env.NODE_EXTRA_CA_CERTS) : null;
}

module.exports = {
    certfile: certfile,
    passphrase: passphrase,
    cert: cert,
    ca: ca
};

