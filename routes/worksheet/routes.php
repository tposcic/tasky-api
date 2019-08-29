<?php

Route::apiResources([
    'activities' => 'ActivityController',
    'logs' => 'LogController',
    'projects' => 'ProjectController',
]);

Route::get('/projects/{id}/logs', 'ProjectController@logs');