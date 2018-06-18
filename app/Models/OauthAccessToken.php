<?php

namespace App\Models;

class OauthAccessToken extends \App\Models\Base\OauthAccessToken
{
	protected $fillable = [
		'user_id',
		'client_id',
		'name',
		'scopes',
		'revoked',
		'expires_at'
	];
}
