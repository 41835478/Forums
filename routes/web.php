<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 * backend Routes Loader
 */

require (__DIR__ .'/Backend/Backend.php');

Auth::routes();

Route::get('/home', 'HomeController@index');
