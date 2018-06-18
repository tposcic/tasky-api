<?php

namespace App\Models;

class WorkgroupUser extends \App\Models\Base\WorkgroupUser
{
	protected $fillable = [
		'workgroup_id',
		'user_id'
	];
}
