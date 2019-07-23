// see https://github.com/zeit/next.js/issues/257
const isProd = process.env.NODE_ENV === 'production'
module.exports = {
  assetPrefix: isProd ? '/workflow' : '', // affects page bundles and app/commons/vendor scripts
  webpack: (config) => {
    if(isProd) {
      config.output.publicPath = `/workflow${config.output.publicPath}`; // affects 'chunks'
    }
    return config;
  },
};