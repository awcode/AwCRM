<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vat extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('order_rows', function(Blueprint $table)
		{
			$table->renameColumn('order_row_value', 'order_row_price');
			$table->decimal('order_row_vat', 20, 2);
			$table->decimal('order_row_vat_rate', 4,2);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('order_rows', function(Blueprint $table)
		{
			$table->renameColumn('order_row_price', 'order_row_value');
			$table->dropColumn(['order_row_vat', 'order_row_vat_rate']);
		});
	}

}
