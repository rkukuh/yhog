<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_gallery', function (Blueprint $table) {
            $table->unsignedInteger('event_id');
            $table->unsignedInteger('gallery_id');

            $table->foreign('event_id')
                    ->references('id')->on('events')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('gallery_id')
                    ->references('id')->on('galleries')
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
        Schema::dropIfExists('event_gallery');
    }
}
