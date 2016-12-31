<?php

Route::group([
    'namespace' => 'access',
    'prefix' => 'access'
], function(){
    /**
     * Roles routes
     */
    Route::group([
        'prefix' => 'roles'
    ], function(){

        // Roles index page
        Route::get('/', 'rolesController@index');

        // For creating a new role
        Route::get('/create', 'rolesController@create');
        Route::post('/', 'rolesController@createRole');

        // For updating a role
        Route::get('/{id}/permissions', 'rolesController@permissions');
        Route::post('/{id}', 'rolesController@updatePermissions');

        // For deleting a role
        Route::delete('/{id}', 'rolesController@delete');

    });

    /**
     * Permissions routes
     */
});