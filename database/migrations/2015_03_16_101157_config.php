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
		
		Schema::table('log', function($table)
		{
			$table->integer('user_id');
			$table->integer('cust_id');
			$table->tinyInteger('log_priority')->default(5);
			$table->string('ip_address', 50);
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
		
		Schema::table('log', function(Blueprint $table)
		{
			$table->dropColumn("user_id");
			$table->dropColumn("cust_id");
			$table->dropColumn("log_priority");
			$table->dropColumn("ip_address");
		});
	}

}
