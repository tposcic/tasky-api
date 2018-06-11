<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 09 Jun 2018 14:41:55 +0000.
 */

namespace App\Models;

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
 * @package App\Models
 */
class WorkgroupUser extends Eloquent
{
	protected $table = 'workgroup_user';
	public $timestamps = false;

	protected $casts = [
		'workgroup_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'workgroup_id',
		'user_id'
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
