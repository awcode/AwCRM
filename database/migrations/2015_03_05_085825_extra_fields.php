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
		Schema::table('customer', function(Blueprint $table)
		{
			$table->integer("staff_added");
			$table->integer("staff_assigned");
			
			$table->softDeletes();
		});
		
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
		Schema::table('customer', function(Blueprint $table)
		{
			$table->dropColumn('staff_added');
			$table->dropColumn('staff_assigned');
		});
		
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn('lastlogin_date');
			$table->dropColumn('lastlogin_ip');
		});
	}

}
