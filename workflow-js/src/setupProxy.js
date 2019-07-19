const proxy = require('http-proxy-middleware');
const fs = require('fs');
const keytar = require('keytar');

module.exports = async function (app) {
    const homedir = require('os').homedir();
    const passphrase = await keytar.getPassword('.certs', 'my.p12');
    //disable password log
    require('http-proxy-middleware/lib/logger').getInstance().setLevel('warn');

    var options = {
        target: {
            host: 'devel.net.ilb.ru',
            port: 443,
            protocol: 'https:',
            pfx: fs.readFileSync(homedir+'/.certs/my.p12'),
            passphrase: passphrase
        },
        changeOrigin: true
    };
    app.use(proxy('/workflow-web', options));
};