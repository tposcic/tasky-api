<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 11 Jun 2018 19:00:39 +0000.
 */

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $preferences
 * @property \Illuminate\Database\Eloquent\Collection $tasks
 * @property \Illuminate\Database\Eloquent\Collection $workgroups
 * @property \Illuminate\Database\Eloquent\Collection $workspaces
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	use \Illuminate\Database\Eloquent\SoftDeletes, HasApiTokens, Notifiable;

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'surname',
		'email',
		'password',
		'remember_token'
	];

	public function preferences()
	{
		return $this->hasMany(\App\Models\Preference::class);
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
