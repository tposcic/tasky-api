<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 18 Jun 2018 00:23:34 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class WorkgroupUser
 * 
 * @property int $id
 * @property int $workgroup_id
 * @property int $user_id
 * 
 * @property \App\Models\User $user
 * @property \App\Models\Workgroup $workgroup
 *
 * @package App\Models\Base
 */
class WorkgroupUser extends Eloquent
{
	protected $table = 'workgroup_user';
	public $timestamps = false;

	protected $casts = [
		'workgroup_id' => 'int',
		'user_id' => 'int'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function workgroup()
	{
		return $this->belongsTo(\App\Models\Workgroup::class);
	}
}
