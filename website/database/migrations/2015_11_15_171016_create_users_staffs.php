<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersStaffs extends Migration {

	public function up()
	{
		Schema::create('users_staffs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('staff_number');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_staffs');
	}

}
