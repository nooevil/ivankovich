const mix = require('laravel-mix');
const stylelint = require('laravel-mix-stylelint');
const eslint = require('laravel-mix-eslint');
const StyleLintPlugin = require('stylelint-webpack-plugin');
const postcssImport = require('postcss-import');
const postcssUrl = require('postcss-url');
const postcssNested = require('postcss-nested');
const postcssPresetEnv = require('postcss-preset-env');
const autoprefixer = require('autoprefixer');

const cssFileList = [
  'common',
  'pages/index',
  'pages/product',
  'pages/catalog',
  'pages/news-list',
  'pages/news-page',
  'pages/checkout',
  'pages/contact',
];

const jsFileList = [
  'common',
  'pages/index',
  'pages/500',
  'pages/product',
  'pages/catalog',
  'pages/news-list',
  'pages/news-page',
  'pages/checkout',
  'pages/contact',
];

const isLocal = process.env.LOCAL_DEV || false;

mix.options({
  clearConsole: true,
});

mix.setPublicPath('themes/lovata-shopaholic-sneakers/assets/');
mix.webpackConfig(webpack => ({
  plugins: [
    new StyleLintPlugin({
      files: ['./themes/lovata-shopaholic-sneakers/partials/**/*.css', './themes/lovata-shopaholic-sneakers/css/**/*.css'],
      configFile: '.stylelintrc',
    }),
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery',
      'window.$': 'jquery',
    }),
  ],
}));
mix.stylelint();

cssFileList.forEach((fileName) => {
  mix.postCss(`./themes/lovata-shopaholic-sneakers/${fileName}.css`, 'css',
    [
      postcssImport(),
      postcssUrl({
        url: 'rebase',
      }),
      postcssNested(),
      postcssPresetEnv({
        stage: 3,
        features: {
          'nesting-rules': true,
        },
      }),
      autoprefixer(),
    ]);
});

jsFileList.forEach(fileName => mix.js(`./themes/lovata-shopaholic-sneakers/${fileName}.js`, 'js'));

mix.sourceMaps(true, 'source-map');

mix.eslint({
  fix: true,
  cache: false,
  failOnError: false,
  configFile: isLocal ? '.local.eslintrc' : '.eslintrc',
});

mix.extract(['jquery']);

mix.version();
