<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('task_id')->unsigned()->nullable()->index('task_id')->comment('parent task id');
			$table->integer('category_id')->unsigned()->index('task_category_id');
			$table->string('title')->nullable()->default('0');
			$table->string('description')->nullable()->default('0');
			$table->enum('urgency', array('Very Low','Low','Medium','High','Very High','Critical'))->default('Very Low');
			$table->dateTime('due_at')->nullable();
			$table->dateTime('finished_at')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasks');
	}

}
