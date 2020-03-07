<?php

namespace App\Models;

class Log extends \App\Models\Base\Log
{
	protected $fillable = [
		'activity_id',
		'project_id',
		'title',
		'description',
		'started_at',
		'finished_at',
		'seconds'
	];

	public function scopeUser($query, $id){
		return $query->leftJoin('projects', 'projects.id', '=', 'logs.project_id')->where('projects.user_id', $id);
	}
}
