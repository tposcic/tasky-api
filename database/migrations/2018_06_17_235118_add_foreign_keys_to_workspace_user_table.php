<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToWorkspaceUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('workspace_user', function(Blueprint $table)
		{
			$table->foreign('user_id', 'workspace_user_users')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('workspace_id', 'workspace_user_workspaces')->references('id')->on('workspaces')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('workspace_user', function(Blueprint $table)
		{
			$table->dropForeign('workspace_user_users');
			$table->dropForeign('workspace_user_workspaces');
		});
	}

}
