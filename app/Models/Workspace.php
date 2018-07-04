<?php

namespace App\Models;

class Workspace extends \App\Models\Base\Workspace
{
	protected $fillable = [
		'title',
		'description',
		'icon',
		'type'
	];
}
