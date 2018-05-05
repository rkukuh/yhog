<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('name');
            $table->integer('size')->nullable();
            $table->text('location')->nullable();
            $table->text('description')->nullable();
            $table->double('price')->nullable();
            $table->double('early_bird_price')->nullable();
            $table->timestamp('early_bird_price_end_at')->nullable();
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            
            $table->unsignedInteger('creator_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('creator_id')
                    ->references('id')->on('users')
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
        Schema::dropIfExists('events');
    }
}
