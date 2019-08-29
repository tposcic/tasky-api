<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 18:51:02 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PasswordReset
 * 
 * @property int $id
 * @property string $email
 * @property string $token
 * @property \Carbon\Carbon $created_at
 *
 * @package App\Models\Base
 */
class PasswordReset extends Eloquent
{
	public $timestamps = false;
}
