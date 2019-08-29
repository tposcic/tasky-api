<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 18:51:02 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Activity
 * 
 * @property int $id
 * @property int $project_id
 * @property string $title
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Project $project
 * @property \Illuminate\Database\Eloquent\Collection $logs
 *
 * @package App\Models\Base
 */
class Activity extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'project_id' => 'int'
	];

	public function project()
	{
		return $this->belongsTo(\App\Models\Project::class);
	}

	public function logs()
	{
		return $this->hasMany(\App\Models\Log::class);
	}

	public function scopeUser($query, $id){
		return $query->leftJoin('projects', 'projects.id', '=', 'activities.project_id')->select('projects.user_id')
		->select('activities.*')->where('projects.user_id', $id);
	}
}
