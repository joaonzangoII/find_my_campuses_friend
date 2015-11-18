<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name', 50);
      $table->string('last_name', 50);
      $table->string('address');
      $table->integer('state_id');
      $table->string('cellnumber', 12)->nullable();
			$table->string('email');
			$table->string('avatar');
	    $table->string('password', 60);
	    $table->string('slug');
	    $table->integer('user_type_id');
			$table->integer('userable_id');
			$table->string('userable_type');
	    $table->string('token')->nullable();
	    $table->rememberToken();
			$table->timestamp("last_online");
	    $table->softDeletes();
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
		Schema::drop('users');
	}

}
