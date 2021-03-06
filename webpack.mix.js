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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copyDirectory("resources/img/**/*", "public/img")
    .version()
    .browserSync({
        proxy: {
            target: "http://nginx"
        },
        files: [
            "./app/Http/Actions/**/*.php",
            "./app/Http/Responders/**/*.php",
            "./app/View/Components/**/*.php",
            "./resources/**/*.blade.php",
            "./public/**/*"
        ],
        open: false,
        reloadOnRestart: true
    });
