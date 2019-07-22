// see https://github.com/zeit/next.js/issues/257
module.exports = {
  assetPrefix: '/workflow', // affects page bundles and app/commons/vendor scripts
  webpack: (config) => {
    config.output.publicPath = `/workflow${config.output.publicPath}`; // affects 'chunks'
    return config;
  },
};