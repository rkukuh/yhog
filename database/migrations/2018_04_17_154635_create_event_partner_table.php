<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPartnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_partner', function (Blueprint $table) {
            $table->unsignedInteger('event_id');
            $table->unsignedInteger('partner_id');

            $table->foreign('event_id')
                    ->references('id')->on('events')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('partner_id')
                    ->references('id')->on('partners')
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
        Schema::dropIfExists('event_partner');
    }
}
