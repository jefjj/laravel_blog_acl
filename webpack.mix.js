const {
  mix
} = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
  .scripts([
    'node_modules/cropperjs/dist/cropper.js',
    'node_modules/jquery-cropper/dist/jquery-cropper.js',
    'node_modules/jquery-mask-plugin/dist/jquery.mask.js',
    'resources/assets/js/schedule-app.js',
    'resources/assets/js/all.js'
  ], 'public/js/all.js')
  .styles([
    'node_modules/cropperjs/dist/cropper.css'
  ], 'public/css/all.css')
  .sass('resources/assets/sass/app.scss', 'public/css')
  .sass('resources/assets/sass/schedule-app.scss', 'public/css')
  .browserSync({
    proxy: '127.0.0.1:9000' //PHP server
  });