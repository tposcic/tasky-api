<?php 

Route::apiResources([
    'users' => 'UserController',
    'preferences' => 'PreferencesController'
]);

Route::get('/workspaces/{id}/users', 'WorkspaceController@getUsers');
Route::post('/workspaces/{id}/users', 'WorkspaceController@addUser');
Route::get('/user', 'UserController@authenticatedUser');