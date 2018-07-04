<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToWorkgroupUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('workgroup_user', function(Blueprint $table)
		{
			$table->foreign('user_id', 'workgroup_user_users')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('workgroup_id', 'workgroup_user_workgroups')->references('id')->on('workgroups')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('workgroup_user', function(Blueprint $table)
		{
			$table->dropForeign('workgroup_user_users');
			$table->dropForeign('workgroup_user_workgroups');
		});
	}

}
