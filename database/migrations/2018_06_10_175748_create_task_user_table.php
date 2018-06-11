<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaskUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('task_user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('task_id')->unsigned()->nullable()->index('task_id');
			$table->integer('user_id')->unsigned()->nullable()->index('user_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('task_user');
	}

}
