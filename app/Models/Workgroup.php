<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 11 Jun 2018 19:00:39 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Workgroup
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $icon
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Workgroup extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'title',
		'description',
		'icon'
	];

	public function users()
	{
		return $this->belongsToMany(\App\Models\User::class, 'workgroup_user')
					->withPivot('id');
	}
}
