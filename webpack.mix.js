let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/assets/js')
    .sass('resources/assets/sass/app.scss', 'public/assets/css');

mix.js('resources/assets/js/bootstrap-table.js', 'public/assets/js')
   .sass('resources/assets/sass/bootstrap-table.scss', 'public/assets/css');

mix.copy('node_modules/selectize.js/dist/js/standalone/selectize.min.js', 'public/assets/js', false)
   .copy('node_modules/selectize.js/dist/css/selectize.default.css', 'public/assets/css', false);

mix.copy('node_modules/font-awesome/fonts', 'public/assets/fonts/font-awesome', false);
