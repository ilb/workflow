const keytar = require('keytar');
keytar.setPassword('.certs', 'my.p12',process.argv[2]);

