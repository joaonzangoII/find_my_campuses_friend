<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersStudents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_students', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('student_number');
			$table->integer('university_id');
			$table->integer('faculty_id');
			$table->integer('department_id');
			$table->integer('course_id');
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
		Schema::drop('users_students');
	}

}
