const mix = require('laravel-mix');

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

mix.disableNotifications();

mix.scripts([
    'resources/js/app.js',
    'resources/js/main.js'
], 'public/js/script.js');

mix.styles([
    'resources/css/main.css',
    'resources/css/top-bar.css',
    'resources/css/registration-page.css',
    'resources/css/index.css'
], 'public/css/style.css');

mix.version();


