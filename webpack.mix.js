const mix = require('laravel-mix');

// /*
//  |--------------------------------------------------------------------------
//  | Mix Asset Management
//  |--------------------------------------------------------------------------
//  |
//  | Mix provides a clean, fluent API for defining some Webpack build steps
//  | for your Laravel applications. By default, we are compiling the CSS
//  | file for the application as well as bundling up all the JS files.
//  |
//  */
//
// mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
//     require('postcss-import'),
//     require('tailwindcss'),
//     require('autoprefixer'),
// ]);


mix.styles([
    'resources/css/bootstrap.min.css',
    'resources/css/main.css',
    'resources/css/all.min.css',
], 'public/css/all.css');


mix.scripts([
    'resources/js/jquery-3.5.1.slim.min.js',
    'resources/js/bootstrap.bundle.min.js',
    'resources/js/custom.js',
], 'public/js/all.js');
