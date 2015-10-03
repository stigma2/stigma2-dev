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
<<<<<<< HEAD
    mix.copy('public/bower_components/foundation/scss/foundation', 'resources/assets/sass/foundation');
    mix.sass('app.scss');
});
=======
    mix.copy('public/bower_components/foundation/scss', 'resources/assets/sass');
    mix.sass(['app.scss']);
    mix.version('public/css/app.css') ; 
    //mix.task('webpack-dev-server');
}); 

>>>>>>> 5cf0b026c1fc859aed6eca7694fa5301b95c32bf
