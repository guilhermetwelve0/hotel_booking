// webpack.mix.js
mix.js('resources/js/app.js', 'public/js')
  .postCss('resources/css/app.css', 'public/css', [
    //
  ])
  .sourceMaps();

if (mix.inProduction()) {
  mix.version();
} else {
  mix.webpackConfig({
    devServer: {
      hot: true,
      port: 5137, // Use a mesma porta definida no servidor Vite
    },
  });
}
