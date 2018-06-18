<?php

namespace App\Models;

class WorkspaceUser extends \App\Models\Base\WorkspaceUser
{
	protected $fillable = [
		'workspace_id',
		'user_id',
		'role'
	];
}
