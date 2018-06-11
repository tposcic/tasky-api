<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 09 Jun 2018 14:41:54 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TaskUser
 * 
 * @property int $id
 * @property int $task_id
 * @property int $user_id
 * 
 * @property \App\Models\Task $task
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class TaskUser extends Eloquent
{
	protected $table = 'task_user';
	public $timestamps = false;

	protected $casts = [
		'task_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'task_id',
		'user_id'
	];

	public function task()
	{
		return $this->belongsTo(\App\Models\Task::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
