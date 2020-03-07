<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Dec 2019 14:12:37 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Preference
 * 
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models\Base
 */
class Preference extends Eloquent
{
	public function users()
	{
		return $this->hasMany(\App\Models\User::class);
	}
}
