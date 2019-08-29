<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkspacesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('workspaces', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title')->nullable();
			$table->string('description')->nullable();
			$table->string('icon')->nullable();
			$table->enum('type', array('personal','private','public'))->default('public');
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
		Schema::drop('workspaces');
	}

}
