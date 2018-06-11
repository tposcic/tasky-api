<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 11 Jun 2018 16:41:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class WorkspaceUser
 * 
 * @property int $id
 * @property int $workspace_id
 * @property int $user_id
 * @property string $role
 * 
 * @property \App\Models\User $user
 * @property \App\Models\Workspace $workspace
 *
 * @package App\Models
 */
class WorkspaceUser extends Eloquent
{
	protected $table = 'workspace_user';
	public $timestamps = false;

	protected $casts = [
		'workspace_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'workspace_id',
		'user_id',
		'role'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function workspace()
	{
		return $this->belongsTo(\App\Models\Workspace::class);
	}
}
