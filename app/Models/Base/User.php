<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 18 Jun 2018 00:23:34 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property int $preference_id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $role
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Preference $preference
 * @property \Illuminate\Database\Eloquent\Collection $tasks
 * @property \Illuminate\Database\Eloquent\Collection $workgroups
 * @property \Illuminate\Database\Eloquent\Collection $workspaces
 *
 * @package App\Models\Base
 */
class User extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'preference_id' => 'int'
	];

	public function preference()
	{
		return $this->belongsTo(\App\Models\Preference::class);
	}

	public function tasks()
	{
		return $this->belongsToMany(\App\Models\Task::class)
					->withPivot('id');
	}

	public function workgroups()
	{
		return $this->belongsToMany(\App\Models\Workgroup::class, 'workgroup_user')
					->withPivot('id');
	}

	public function workspaces()
	{
		return $this->belongsToMany(\App\Models\Workspace::class, 'workspace_user')
					->withPivot('id', 'role');
	}
}
