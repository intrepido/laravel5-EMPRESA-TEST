var elixir = require('laravel-elixir');
var bowerDir = 'vendor/bower_components/';

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |gulp
 */

elixir(function(mix) {
    mix.copy(bowerDir + 'bootstrap/fonts', 'public/fonts')
        .copy(bowerDir + 'metisMenu/dist/metisMenu.min.css', 'public/css/metisMenu.min.css')
        .copy(bowerDir + 'jquery/dist/jquery.min.js', 'public/js/jquery.min.js')
        .copy(bowerDir + 'bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js')
        .copy(bowerDir + 'metisMenu/dist/metisMenu.min.js', 'public/js/metisMenu.min.js');

    mix.less('app.less');
    mix.scripts(['template.js'], 'public/js/admin.js');
    mix.styles(['template.css'], 'public/css/admin.css');

    /*
    * Todos los archivos js comprimidos en unico fichero
    *
    mix.scripts(['jquery/dist/jquery.min.js',
                 'bootstrap/dist/js/bootstrap.min.js'
                ], 'public/js/all.js', bowerDir);*/
});
