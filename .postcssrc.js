module.exports = {
  // parser: 'sugarss',
  plugins: [
    require('autoprefixer'),
    require('postcss-import')(),
    require('postcss-preset-env')(),
    require('cssnano')({
      preset: ['default', {
        discardComments: {
          removeAll: true,
        },
        autoprefixer: true,
        safe: true,
      }],
    }),
    // require('stylelint')(),
  ],
};
