<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('event_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->tinyInteger('quantity');
            $table->double('price');
            
            $table->unsignedInteger('creator_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('creator_id')
                    ->references('id')->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('event_id')
                    ->references('id')->on('events')
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
        Schema::dropIfExists('participants');
    }
}
