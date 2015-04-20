<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactsAddressesMultipurpose extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contact', function(Blueprint $table)
		{
			$table->string("link_type", 20);
			$table->renameColumn('cust_id', 'link_id');
		});
		Schema::table('address', function(Blueprint $table)
		{
			$table->string("link_type", 20);
			$table->renameColumn('cust_id', 'link_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contact', function(Blueprint $table)
		{
			$table->dropColumn("link_type");
			$table->renameColumn('link_id', 'cust_id');
		});
		Schema::table('address', function(Blueprint $table)
		{
			$table->dropColumn("link_type");
			$table->renameColumn('link_id', 'cust_id');
		});
	}

}
