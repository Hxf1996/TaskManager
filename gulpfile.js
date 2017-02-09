var elixir = require('laravel-elixir');
require('laravel-elixir-vueify');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
elixir(function(mix) {
    mix.sass('app.scss')
        .scripts([
            'charts/Chart.min.js',
            'charts/pie.js',
            'charts/bar.js',
            ],
            'public/js/charts.js')
        .browserify('vue/app.js')
        .browserify('vue/search.js');
    
    mix.copy('node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js','public/js/bootstrap.min.js');
    mix.copy('node_modules/jquery/dist/jquery.min.js','public/js/jquery.min.js');
    mix.copy('node_modules/vue-resource/dist/vue-resource.js','public/js/vue-resource.js');
    mix.copy('node_modules/font-awesome/css/font-awesome.min.css','public/css/font-awesome.min.css');
    mix.copy('node_modules/animate.css/animate.min.css','public/css/animate.css');
    mix.copy('node_modules/font-awesome/fonts','public/fonts');

});
