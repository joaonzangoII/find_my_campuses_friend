<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompaniesSosModels extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies_sos_models', function(Blueprint $table)
		{
      $table->integer('sos_model_id')->unsigned()->index();
      // $table->foreign('sos_model_id')->references('id')->on('sos_models')->onDelete('cascade');
      $table->integer('company_id')->unsigned()->index();
      // $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('companies_sos_models');
	}

}
