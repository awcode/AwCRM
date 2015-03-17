<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('order_id');
			$table->integer('cust_id');
			$table->integer('user_id');
			$table->string('order_status', 20);
			$table->boolean('order_confirmed');
			$table->decimal('order_value', 20, 2);
			$table->decimal('order_balance', 20, 2);
			$table->string('order_cur_id', 6);
			$table->date('order_due_date');
			$table->date('order_confirmed_date');
			$table->date('order_completed_date');
			$table->timestamps();
		});

		Schema::create('order_rows', function(Blueprint $table)
		{
			$table->increments('order_row_id');
			$table->integer('order_id');
			$table->boolean('order_row_cancel');
			$table->decimal('order_row_value', 20, 2);
			$table->string('order_row_cur_id', 6);
			$table->string('order_row_cur_exchange', 20, 10);
			$table->date('order_row_cur_exchange_date');
			$table->string('order_row_type', 50);
			$table->text('order_row_object');
			$table->timestamps();
		});

		Schema::create('payments', function(Blueprint $table)
		{
			$table->increments('pay_id');
			$table->decimal('pay_amount', 20, 2);
			$table->string('pay_cur_id', 6);
			$table->integer('pay_account');
			$table->string('pay_record_by');
			$table->timestamps();
		});

		Schema::create('payment_allocation', function(Blueprint $table)
		{
			$table->increments('pay_allocate_id');
			$table->integer('order_id');
			$table->decimal('pay_allocate_amount', 20, 2);
			$table->string('pay_receive_cur_id', 6);
			$table->string('pay_allocate_cur_id', 6);
			$table->string('pay_cur_exchange', 20, 10);
			$table->date('pay_exchange_date');
			$table->string('pay_explain', 250);
			$table->timestamps();
		});

		Schema::create('triggers', function(Blueprint $table)
		{
			$table->increments('trigger_id');
			$table->string('trigger_event',250);
			$table->text("trigger_object");
			$table->timestamps();
		});
		
		Schema::create('log', function(Blueprint $table)
		{
			$table->increments('log_id');
			$table->morphs('logtype');
			$table->text("log_text");
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
		Schema::drop('order_rows');
		Schema::drop('payments');
		Schema::drop('payment_allocation');
		Schema::drop('triggers');
		Schema::drop('log');
	}

}
