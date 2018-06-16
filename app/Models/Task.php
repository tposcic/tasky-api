<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 11 Jun 2018 19:00:39 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Task
 * 
 * @property int $id
 * @property int $task_id
 * @property int $category_id
 * @property string $title
 * @property string $description
 * @property string $urgency
 * @property \Carbon\Carbon $due_at
 * @property \Carbon\Carbon $finished_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Category $category
 * @property \App\Models\Task $task
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property \Illuminate\Database\Eloquent\Collection $tasks
 *
 * @package App\Models
 */
class Task extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'task_id' => 'int',
		'category_id' => 'int'
	];

	protected $dates = [
		'due_at',
		'finished_at'
	];

	protected $fillable = [
		'task_id',
		'category_id',
		'title',
		'description',
		'urgency',
		'due_at',
		'finished_at'
	];

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
	}

	public function task()
	{
		return $this->belongsTo(\App\Models\Task::class);
	}

	public function users()
	{
		return $this->belongsToMany(\App\Models\User::class)
					->withPivot('id');
	}

	public function tasks()
	{
		return $this->hasMany(\App\Models\Task::class);
	}
}
