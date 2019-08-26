<?php

Route::get('/', 'HomeController@info');

Route::post('register', 'RegisterController@register');

Route::middleware('auth:api')->group(function () {
    Route::apiResources([
        'tasks' => 'TaskController',
        'workspaces' => 'WorkspaceController',
        'workgroups' => 'WorkgroupController',
        'users' => 'UserController',
        'categories' => 'CategoryController',
        'preferences' => 'PreferencesController'
    ]);

    Route::get('/workspaces/{id}/users', 'WorkspaceController@getUsers');
    Route::post('/workspaces/{id}/users', 'WorkspaceController@addUser');

    Route::get('/user', 'UserController@authenticatedUser');
});