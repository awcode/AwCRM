<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExtraCompanyFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('customer', function(Blueprint $table)
		{
			 $table->string('company_phone');
			 $table->string('company_website');
			 $table->string('company_facebook');
			 $table->string('company_skype');
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
			$table->dropColumn('company_phone');
			$table->dropColumn('company_website');
			$table->dropColumn('company_facebook');
			$table->dropColumn('company_skype');
		});
	}

}
