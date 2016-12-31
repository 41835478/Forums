<?php

Route::group([
    'namespace' => 'backend',
    'prefix' => 'admin',
    'middleware' => ['role:admin']
], function(){
    route::get('/', 'backendController@index');

    require(__DIR__ . '/access.php');
});