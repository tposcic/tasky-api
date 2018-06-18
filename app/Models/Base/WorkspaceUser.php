<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 18 Jun 2018 00:23:34 +0000.
 */

namespace App\Models\Base;

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
 * @package App\Models\Base
 */
class WorkspaceUser extends Eloquent
{
	protected $table = 'workspace_user';
	public $timestamps = false;

	protected $casts = [
		'workspace_id' => 'int',
		'user_id' => 'int'
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
