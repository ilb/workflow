const proxy = require('http-proxy-middleware');

//const homedir = require('os').homedir();
const fs = require('fs');
const path = require('path');
const xpath = require('xpath');
const DOMParser = require('xmldom').DOMParser;

const configpath = path.resolve(path.join(process.env.HOME, '.config/context.xml'))

const xml = fs.readFileSync(configpath, 'utf8');
const doc = new DOMParser().parseFromString(xml)
const certpath = xpath.select1("//Environment[@name='ru.bystrobank.apps.workflow.certfile']/@value", doc).value;
const cert = fs.readFileSync(certpath);
const passphrase = xpath.select1("//Environment[@name='ru.bystrobank.apps.workflow.cert_PASSWORD']/@value",doc).value;

module.exports = async function (app) {

    var options = {
        target: {
            host: 'devel.net.ilb.ru',
            port: 443,
            protocol: 'https:',
            key: cert,
            cert: cert,
            passphrase: passphrase

        },
        logLevel: 'warn',
        changeOrigin: true
    };

    app.use(proxy('/workflow-web', options));
};