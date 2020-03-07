<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Dec 2019 14:12:37 +0000.
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
