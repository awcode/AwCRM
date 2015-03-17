<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*
Universal events... multipurpose identifiers and ids. Customer added, order raised, callback, meeting, visa expiry, tasks etc. With identifiers can update if causes change.
Big calendar view in dashboard...plus list view.
Must mark as completed, postpone or show overdue.
Timeframe, duration and schedule times.
*/

class EventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			
			$table->increments('event_id');
			$table->integer("event_status");
			$table->string("event_title", 150);
			$table->text("event_desc");
			$table->datetime("deadline")->nullable();
			$table->datetime("scheduled")->nullable();
			$table->integer("duration_minutes");
			$table->integer("duration_days");
			$table->string("identifier", 150);
			$table->integer("identifier_id");
			$table->text("identifier_object");
			$table->text("repeat_object");
			$table->integer("start_after");
			$table->integer("start_next");
			$table->string("users", 250);
			$table->string("customers", 250);
			$table->string("contacts", 250);
			$table->integer("address_id");
			
			$table->index('deadline');
			$table->index('scheduled');
			$table->index("identifier", "identifier_id");
			$table->index('users');
			$table->index('customers');
			$table->index('contacts');
			
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('eventtypes', function(Blueprint $table)
		{
			$table->increments('event_type_id');
			$table->string("event_type_name", 50);
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
		Schema::drop('events');
		Schema::drop('eventtypes');
	}

}
