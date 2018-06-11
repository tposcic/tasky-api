<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 09 Jun 2018 14:41:55 +0000.
 */

namespace App\Models;

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
 * @package App\Models
 */
class Workspace extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'title',
		'description',
		'icon',
		'type'
	];

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
