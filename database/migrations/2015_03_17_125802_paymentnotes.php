<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Paymentnotes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payments', function(Blueprint $table)
		{
			$table->text("pay_details");
			$table->boolean("pay_allocated");
		});

		Schema::table('payment_allocation', function(Blueprint $table)
		{
			$table->integer("pay_id");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('payments', function(Blueprint $table)
		{
			$table->dropColumn("pay_details");
			$table->dropColumn("pay_allocated");
		});
		
		Schema::table('payment_allocation', function(Blueprint $table)
		{
			$table->dropColumn("pay_id");
		});
	}

}
