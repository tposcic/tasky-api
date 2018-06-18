<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 18 Jun 2018 00:23:34 +0000.
 */

namespace App\Models\Base;

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
 * @package App\Models\Base
 */
class TaskUser extends Eloquent
{
	protected $table = 'task_user';
	public $timestamps = false;

	protected $casts = [
		'task_id' => 'int',
		'user_id' => 'int'
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
