<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer', function(Blueprint $table)
		{
			$table->increments('cust_id');
			$table->string('company_name', 150);
			$table->string('registered_name', 150);
			$table->string('tax_number', 150);
			$table->string('company_email', 100);
			$table->integer('cat_id');
			$table->integer('cust_status');
			$table->timestamps();
		});
		
		Schema::create('contact', function(Blueprint $table)
		{
			$table->increments('contact_id');
			$table->integer('cust_id');
			$table->string('firstname', 150);
			$table->string('surname', 150);
			$table->string('phone', 150);
			$table->string('mobile', 150);
			$table->string('email', 100);
			$table->string('position', 100);

			$table->timestamps();
		});
		
		
		Schema::create('address', function(Blueprint $table)
		{
			$table->increments('address_id');
			$table->string('cust_id', 100);
			$table->integer('address_type');
			$table->string('address1', 100);
			$table->string('address2', 100);
			$table->string('address3', 100);
			$table->string('address_city', 100);
			$table->string('address_province', 100);
			$table->string('address_postcode', 100);
			$table->integer('country_id');
			$table->timestamps();
		});
		
		Schema::create('country', function(Blueprint $table)
		{
			$table->string('iso_code2', 2)->primary();
			$table->string('iso_code3', 3);
			$table->string('un_num', 3);
			$table->string('tel', 6);
			$table->string('country', 100);
			$table->timestamps();
		});
		
		Schema::create('category', function(Blueprint $table)
		{
			$table->increments('cat_id');
			$table->string('cat_name', 150);
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
		Schema::drop('customer');
		Schema::drop('contact');
		Schema::drop('address');
		Schema::drop('country');
		Schema::drop('category');
	}

}
