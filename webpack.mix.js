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

mix.js('./resources/js/app.js', 'public/js')
    .sass('./resources/sass/app.scss', 'public/css');


// Admin UI Kit - Material Dashboard 2 - v3.0.0
mix.scripts([
        // './resources/admin-ui/js/core/popper.min.js',
        './resources/admin-ui/js/core/bootstrap.min.js',
        './resources/admin-ui/js/plugins/perfect-scrollbar.min.js',
        './resources/admin-ui/js/material-dashboard.js'
    ], 'public/admin-ui/js/app.js')
    .postCss('./resources/admin-ui/css/material-dashboard.css', 'public/admin-ui/css')
    .postCss('./resources/admin-ui/css/nucleo-icons.css', 'public/admin-ui/css')
    .postCss('./resources/admin-ui/css/nucleo-svg.css', 'public/admin-ui/css')
    .postCss('./resources/admin-ui/css/custom.css', 'public/admin-ui/css');
