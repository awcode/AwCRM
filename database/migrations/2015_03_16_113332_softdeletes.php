<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Softdeletes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('address', function($table)
		{
			$table->softDeletes();
		});
		Schema::table('category', function($table)
		{
			$table->softDeletes();
		});
		Schema::table('contact', function($table)
		{
			$table->softDeletes();
		});
		Schema::table('log', function($table)
		{
			$table->softDeletes();
		});
		Schema::table('order_rows', function($table)
		{
			$table->softDeletes();
		});
		Schema::table('orders', function($table)
		{
			$table->softDeletes();
		});
		Schema::table('payment_allocation', function($table)
		{
			$table->softDeletes();
		});
		Schema::table('payments', function($table)
		{
			$table->softDeletes();
		});
		Schema::table('triggers', function($table)
		{
			$table->softDeletes();
		});
		Schema::table('users', function($table)
		{
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
		//
	}

}
