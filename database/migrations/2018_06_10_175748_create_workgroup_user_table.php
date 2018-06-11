<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkgroupUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('workgroup_user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('workgroup_id')->unsigned()->nullable()->index('workgroup_id');
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
		Schema::drop('workgroup_user');
	}

}
