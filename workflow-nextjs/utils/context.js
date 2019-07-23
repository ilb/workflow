var doc = null;
if (!process.browser) {
    const fs = require('fs');
    const path = require('path');
    
    const DOMParser = require('xmldom').DOMParser;

    const configpath = path.resolve(path.join(process.env.HOME, '.config/context.xml'))

    const xml = fs.readFileSync(configpath, 'utf8');
    doc = new DOMParser().parseFromString(xml);
}

module.exports = {
    lookup: function (name) {
        const xpath = require('xpath');
        return process.browser ? null : xpath.select1("//Environment[@name='" + name + "']/@value", doc).value;
    }
};