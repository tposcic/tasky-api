<?php

namespace App\Models;

class Project extends \App\Models\Base\Project
{
	protected $fillable = [
		'user_id',
		'title',
		'description'
	];
}
