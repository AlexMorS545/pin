const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss')

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js([
    'resources/js/close.js',
    'resources/js/form.js',
    'resources/js/products.js',
    'resources/js/show.js',
    ], 'public/js/app.js');


mix.sass('resources/sass/app.scss', 'public/css').options({
    postCss: [ tailwindcss('./tailwind.config.js') ],
    processCssUrls: false
});

mix.browserSync(process.env.APP_URL)
