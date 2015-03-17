<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transporters extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transport', function(Blueprint $table)
		{
			$table->increments("transport_id");
			$table->string("transport_status", 20);
			$table->decimal('transport_price', 20, 2);
			$table->timestamps();
			$table->softDeletes();
		});
		
		Schema::create('transport_legs', function(Blueprint $table)
		{
			$table->increments("transport_leg_id");
			$table->integer("transport_id");
			$table->string("transport_leg_start", 250);
			$table->decimal("transport_leg_start_lat", 18,12);
			$table->decimal("transport_leg_start_lng", 18,12);
			$table->datetime("transport_leg_start_time");
			$table->string("transport_leg_end", 250);
			$table->decimal("transport_leg_end_lat", 18,12);
			$table->decimal("transport_leg_end_lng", 18,12);
			$table->datetime("transport_leg_end_time");
			$table->text("transport_leg_drops");
			$table->integer("transport_leg_driving_minutes");
			$table->decimal("transport_leg_driving_miles", 9, 1);
			$table->boolean("transport_leg_fixed_end_time");
			$table->boolean("transport_leg_vehicle_stays_after");
			$table->integer("vehicle_type_id");
			$table->timestamps();
			$table->softDeletes();
		});
		
		Schema::create('cargo', function(Blueprint $table)
		{
			$table->increments("cargo_id");
			$table->integer("transport_id");
			$table->integer("cargo_type_id");
			$table->text("cargo_details");
			$table->text("cargo_inventary");
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('vehicle_types', function(Blueprint $table)
		{
			$table->increments("vehicle_type_id");
			$table->string("vehicle_type_name", 50);
			$table->text("cargo_limits");
			$table->timestamps();
			$table->softDeletes();
		});


		Schema::create('cargo_types', function(Blueprint $table)
		{
			$table->increments("cargo_type_id");
			$table->string("cargo_type_name", 50);
			$table->integer("cargo_group_id");
			$table->integer("cargo_type_count_percentage")->default(100);
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('cargo_groups', function(Blueprint $table)
		{
			$table->increments("cargo_group_id");
			$table->string("cargo_group_name", 50);
			$table->boolean("cargo_group_public");
			$table->boolean("cargo_group_count");
			$table->integer("cargo_group_max_count");
			$table->boolean("cargo_group_weight");
			$table->timestamps();
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
		Schema::drop('transport');
		Schema::drop('transport_legs');
		Schema::drop('cargo');
		Schema::drop('vehicle_types');
		Schema::drop('cargo_types');
		Schema::drop('cargo_groups');
	}

}
