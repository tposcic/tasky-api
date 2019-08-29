<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 18:51:02 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Log
 * 
 * @property int $id
 * @property int $activity_id
 * @property int $project_id
 * @property string $title
 * @property string $description
 * @property \Carbon\Carbon $started_at
 * @property \Carbon\Carbon $finished_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Activity $activity
 * @property \App\Models\Project $project
 *
 * @package App\Models\Base
 */
class Log extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'activity_id' => 'int',
		'project_id' => 'int'
	];

	protected $dates = [
		'started_at',
		'finished_at'
	];

	public function activity()
	{
		return $this->belongsTo(\App\Models\Activity::class);
	}

	public function project()
	{
		return $this->belongsTo(\App\Models\Project::class);
	}

	public function scopeUser($query, $id){
		return $query->leftJoin('projects', 'projects.id', '=', 'activities.project_id')->where('projects.user_id', $id);
	}	
}
