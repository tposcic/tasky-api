<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 18:51:02 +0000.
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
