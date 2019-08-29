<?php

Route::apiResources([
    'tasks' => 'TaskController',
    'workspaces' => 'WorkspaceController',
    'workgroups' => 'WorkgroupController',
    'categories' => 'CategoryController',
]);