// const { VueLoaderPlugin } = require('vue-loader');
const DependencyExtractionWebpackPlugin = require('@wordpress/dependency-extraction-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const path = require('path');

const assets = './assets';
const shopPath = './woocommerce';
const outputPath = '_dist';
const localDomain = 'http://lab.test/';

const entryPoints = {
  'my-main': `${assets}/my-main.js`,
  'my-admin': `${assets}/my-admin.js`,
  'my-parts': './parts/_my-parts.js',
  'my-gutenberg': './gutenberg/my-gutenberg.js',
  'my-editor': './gutenberg/my-editor.js',

  shop: `${shopPath}/js/shop.js`,
  'shop-editor': `${shopPath}/css/shop-editor.sass`,
  'shop-admin': `${shopPath}/css/shop-admin.sass`,
};

module.exports = {
  entry: entryPoints,
  output: {
    publicPath: '',
    path: path.resolve(__dirname, outputPath),
    filename: '[name].js',
  },
  plugins: [
    // new VueLoaderPlugin(),

    new BrowserSyncPlugin({
      proxy: localDomain,
      files: [`${outputPath}/*.css`],
      injectCss: true,
    }, { reload: false }),

    new MiniCssExtractPlugin({
      filename: '[name].css',
    }),

    new DependencyExtractionWebpackPlugin({
      injectPolyfill: true,
    }),
  ],
  module: {
    rules: [
      // {
      //   test: /\.vue$/,
      //   use: 'vue-loader',
      // },
      {
        test: /\.s?[ac]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader',
        ],
      },
      {
        test: /\.(jpg|jpeg|png|gif|woff|woff2|eot|ttf|svg)$/i,
        use: 'url-loader?limit=1024',
      },
      {
        test: /\.jsx$/i,
        use: [
          require.resolve('thread-loader'),
          {
            loader: require.resolve('babel-loader'),
            options: {
              cacheDirectory: process.env.BABEL_CACHE_DIRECTORY || true,
              babelrc: false,
              configFile: false,
              presets: [
                require.resolve('@wordpress/babel-preset-default'),
              ],
            },
          },
        ],
      },
    ],
  },
  resolve: {
    alias: {
      '@lib': path.resolve(__dirname, '_lib/'),
    },
  },
};
