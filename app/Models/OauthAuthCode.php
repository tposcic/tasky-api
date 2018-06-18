<?php

namespace App\Models;

class OauthAuthCode extends \App\Models\Base\OauthAuthCode
{
	protected $fillable = [
		'user_id',
		'client_id',
		'scopes',
		'revoked',
		'expires_at'
	];
}
