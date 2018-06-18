<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkspaceUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('workspace_user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('workspace_id')->unsigned()->nullable()->index('workspace_id');
			$table->integer('user_id')->unsigned()->nullable()->index('user_id');
			$table->enum('role', array('admin','moderator','user'))->nullable()->default('user');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('workspace_user');
	}

}
