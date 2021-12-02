<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('event_name');
            $table->text('event_description');
            $table->date('event_date');
            $table->time('event_start_time');
            $table->integer('vip_ticket_price');
            $table->integer('regular_ticket_price');
            $table->integer('max_vip_attendees');
            $table->integer('max_regular_attendees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('event_name');
            $table->dropColumn('event_description');
            $table->dropColumn('event_date');
            $table->dropColumn('event_start_time');
            $table->dropColumn('vip_ticket_price');
            $table->dropColumn('regular_ticket_price');
            $table->dropColumn('max_vip_attendees');
            $table->dropColumn('max_regular_attendees');
        });
    }
}
