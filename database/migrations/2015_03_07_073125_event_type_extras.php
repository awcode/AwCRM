<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventTypeExtras extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('eventtypes', function(Blueprint $table)
		{
			$table->string("event_type_color", 40);
			$table->string("event_type_icon", 50);
			$table->text("event_type_config");
			$table->boolean("event_type_standard");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('eventtypes', function(Blueprint $table)
		{
			$table->dropColumn("event_type_color");
			$table->dropColumn("event_type_icon");
			$table->dropColumn("event_type_config");
			$table->dropColumn("event_type_standard");
		});
	}

}
