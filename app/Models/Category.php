<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 09 Jun 2018 14:41:54 +0000.
 */

namespace App\Models;

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
 * @package App\Models
 */
class Category extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'workspace_id' => 'int'
	];

	protected $fillable = [
		'workspace_id',
		'title',
		'description',
		'icon'
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
