<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 18:51:02 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Project
 * 
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $activities
 * @property \Illuminate\Database\Eloquent\Collection $logs
 *
 * @package App\Models\Base
 */
class Project extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'user_id' => 'int'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function activities()
	{
		return $this->hasMany(\App\Models\Activity::class);
	}

	public function logs()
	{
		return $this->hasMany(\App\Models\Log::class);
	}
}
