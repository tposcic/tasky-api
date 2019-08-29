<?php

namespace App\Models;

class Activity extends \App\Models\Base\Activity
{
	protected $fillable = [
		'project_id',
		'title',
		'description'
	];

	public function scopeUser($query, $id){
		return $query->leftJoin('projects', 'projects.id', '=', 'activities.project_id')->where('projects.user_id', $id);
	}	
}
