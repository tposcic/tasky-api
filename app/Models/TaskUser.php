<?php

namespace App\Models;

class TaskUser extends \App\Models\Base\TaskUser
{
	protected $fillable = [
		'task_id',
		'user_id'
	];
}
