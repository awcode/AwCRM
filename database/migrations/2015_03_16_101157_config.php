<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Config extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('config', function(Blueprint $table)
		{
			$table->string('config_id', 50);
			$table->text('config_value');
			$table->primary('config_id');
		});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('config');
		
	}

}
