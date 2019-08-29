<?php

Route::get('/', 'HomeController@info');
Route::post('register', 'RegisterController@register');

Route::middleware('auth:api')->group(function () {
    require_once('tasky/routes.php');
    require_once('user/routes.php');
    require_once('worksheet/routes.php');
});