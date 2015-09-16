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
        'material/roboto.min.css',
        'material/material.min.css',
        'material/ripples.min.css',
        'addons/slick/slick.css',
        'addons/slick/slick-theme.css',
        'shop-homepage.css'
    ]);

    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'material/ripples.min.js',
        'material/material.min.js',
        'addons/slick/slick.js',
        'app.js'
    ]);
    mix.version(['css/all.css', 'js/all.js']);
});
