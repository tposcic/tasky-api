<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Dec 2019 14:12:37 +0000.
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
 * @property int $seconds
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
		'project_id' => 'int',
		'seconds' => 'int'
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
}
