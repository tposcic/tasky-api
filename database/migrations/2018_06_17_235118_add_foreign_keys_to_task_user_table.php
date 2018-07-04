<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTaskUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('task_user', function(Blueprint $table)
		{
			$table->foreign('task_id', 'task_user_tasks')->references('id')->on('tasks')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'task_user_users')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('task_user', function(Blueprint $table)
		{
			$table->dropForeign('task_user_tasks');
			$table->dropForeign('task_user_users');
		});
	}

}
