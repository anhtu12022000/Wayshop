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

mix.js('resources/js/wayshop/app.js', 'public/front_assets/js/allscript.js')
   .sass('resources/sass/app.scss', 'public/css/app.css');


   mix.js('resources/js/app.js', 'public/js/app.js');
   mix.js('resources/js/admin.js', 'public/js/admin.js');

   mix.webpackConfig({

   	resolve: {
   		alias: {
   			'vue$': 'vue/dist/vue.runtime.common.js'
   		}
   	}

   });