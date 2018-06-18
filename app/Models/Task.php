<?php

namespace App\Models;

class Task extends \App\Models\Base\Task
{
	protected $fillable = [
		'task_id',
		'category_id',
		'title',
		'description',
		'urgency',
		'due_at',
		'finished_at'
	];
}
