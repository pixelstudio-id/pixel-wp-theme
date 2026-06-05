// const { VueLoaderPlugin } = require('vue-loader');
const DependencyExtractionWebpackPlugin = require('@wordpress/dependency-extraction-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const path = require('path');

const outputPath = '_dist';
const localDomain = 'http://lab.test/';

const entryPoints = {
  'my-theme': './my-theme.js',
  'my-admin': './my-admin.js',
  'my-editor': './my-editor.js',

  'my-shop': './woocommerce/my-shop.js',
  'shop-editor': './woocommerce/my-shop-editor.sass',
  'shop-admin': './woocommerce/my-shop-admin.sass',
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
        test: /\.s?[c]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader',
        ],
      },
      {
        test: /\.sass$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          {
            loader: 'sass-loader',
            options: {
              sassOptions: { indentedSyntax: true },
            },
          },
        ],
      },
      {
        test: /\.(jpg|jpeg|png|gif|woff|woff2|eot|ttf)$/i,
        use: 'url-loader?limit=2048',
      },
      {
        test: /\.(svg|svgz)(\?.+)?$/,
        oneOf: [
          // {
          //   resourceQuery: /inline/,
          //   loader: 'vue-svg-loader',
          //   options: {
          //     svgo: {
          //       plugins: [
          //         { removeDoctype: true },
          //         { removeComments: true },
          //       ],
          //     },
          //   },
          // },
          {
            loader: 'url-loader',
            options: {
              limit: 2048,
              name: 'svg/[name].[ext]',
            },
          },
        ],
      },
      {
        test: /\.jsx$/i,
        use: [require.resolve('thread-loader'), {
          loader: require.resolve('babel-loader'),
          options: {
            cacheDirectory: process.env.BABEL_CACHE_DIRECTORY || true,
            babelrc: false,
            configFile: false,
            presets: [require.resolve('@wordpress/babel-preset-default')],
          },
        }],
      },
    ],
  },
  resolve: {
    alias: {
      '@lib': path.resolve(__dirname, '_lib/'),
    },
  },
};
