const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss');

    /*******************/
    /* Backend Scripts */
    /*******************/
    mix.webpack('backend/app.js', 'resources/assets/js/backend/build/custom-build.js');

    mix.scripts([
        'backend/scripts/jquery.min.js',
        'backend/scripts/bootstrap.min.js',
        'backend/build/custom-build.js',
        'backend/scripts/toastr.min.js',
        'backend/scripts/gentelella.min.js'

    ], 'public/js/backend-scripts.js');

    /******************/
    /* Backend styles */
    /******************/
    mix.sass([
        'backend/app.scss'
    ], 'public/css/backend.css');

    /********************/
    /* Copy Stylesheets */
    /********************/

    // Bootstrap
    mix.copy('node_modules/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css');

    // Font awesome
    mix.copy('node_modules/gentelella/vendors/font-awesome/css/font-awesome.min.css', 'public/css/font-awesome.min.css');

    // Gentelella
    mix.copy('node_modules/gentelella/build/css/custom.min.css', 'public/css/gentelella.min.css');

    //



    /**************/
    /* Copy Fonts */
    /**************/

    // Bootstrap
    mix.copy('node_modules/gentelella/vendors/bootstrap/fonts/', 'public/fonts');

    // Font awesome
    mix.copy('node_modules/gentelella/vendors/font-awesome/fonts/', 'public/fonts');

    mix.version([
        "public/js/backend-scripts.js",
        'public/css/backend.css'
    ]);

});
