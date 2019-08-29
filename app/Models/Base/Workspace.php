<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 18:51:02 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Workspace
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $icon
 * @property string $type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $categories
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models\Base
 */
class Workspace extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	public function categories()
	{
		return $this->hasMany(\App\Models\Category::class);
	}

	public function users()
	{
		return $this->belongsToMany(\App\Models\User::class, 'workspace_user')
					->withPivot('id', 'role');
	}
}
