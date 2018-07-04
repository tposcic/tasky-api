<?php

namespace App\Models;

class Category extends \App\Models\Base\Category
{
	protected $fillable = [
		'workspace_id',
		'title',
		'description',
		'icon'
	];
}
