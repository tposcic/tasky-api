<?php

namespace App\Models;

class OauthRefreshToken extends \App\Models\Base\OauthRefreshToken
{
	protected $fillable = [
		'access_token_id',
		'revoked',
		'expires_at'
	];
}
