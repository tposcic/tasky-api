<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Dec 2019 14:12:37 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Category
 * 
 * @property int $id
 * @property int $workspace_id
 * @property string $title
 * @property string $description
 * @property string $icon
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Workspace $workspace
 * @property \Illuminate\Database\Eloquent\Collection $tasks
 *
 * @package App\Models\Base
 */
class Category extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'workspace_id' => 'int'
	];

	public function workspace()
	{
		return $this->belongsTo(\App\Models\Workspace::class);
	}

	public function tasks()
	{
		return $this->hasMany(\App\Models\Task::class);
	}
}
