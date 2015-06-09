<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExtraFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table('users', function(Blueprint $table)
		{
			$table->datetime("lastlogin_date");
			$table->string("lastlogin_ip");
			
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
		
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn('lastlogin_date');
			$table->dropColumn('lastlogin_ip');
		});
	}

}
