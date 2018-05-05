<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_participant', function (Blueprint $table) {
            $table->unsignedInteger('event_id');
            $table->unsignedInteger('participant_id');

            $table->foreign('event_id')
                    ->references('id')->on('events')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('participant_id')
                    ->references('id')->on('participants')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_participant');
    }
}
