const proxy = require('http-proxy-middleware');
const fs = require('fs');
const keytar = require('keytar');

module.exports = async function (app) {
    const passphrase = await keytar.getPassword('.certs', 'my.p12');
    var options = {
        target: {
            host: 'devel.net.ilb.ru',
            port: 443,
            protocol: 'https:',
            pfx: fs.readFileSync('/home/slavb/.certs/my.p12'),
            passphrase: passphrase
        },
        changeOrigin: true
    };
    app.use(proxy('/workflow-web', options));
};