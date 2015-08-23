var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
        'bootstrap.min.css',
        'shop-homepage.css',
        'addons/bootstrap/jquery.smartmenus.bootstrap.css'
    ]);

    mix.scripts([
        'jquery.js',
        'bootstrap.min.js',
        'jquery.smartmenus.min.js',
        'addons/bootstrap/jquery.smartmenus.bootstrap.js',
        'app.js'
    ]);
    mix.version(['css/all.css', 'js/all.js']);
});
