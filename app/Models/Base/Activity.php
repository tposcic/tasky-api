<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Dec 2019 14:12:37 +0000.
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
}
