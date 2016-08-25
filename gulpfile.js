var elixir = require('laravel-elixir');

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
  mix.styles([
    'milligram.css',
    'select2.css',
    'styles.css'
  ]);

  mix.scripts([
    'jquery-3.1.0.min.js',
    'select2.min.js',
    'jquery.timeago.js',
    'scripts.js'
  ]);

  mix.version([
    'css/all.css',
    'js/all.js'
  ]);
});
