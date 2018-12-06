<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::post('register', 'RegisterController@register');

Route::middleware(['auth:api', 'cors'])->group(function () {
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