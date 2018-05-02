<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('creator_id');
            $table->unsignedInteger('donation_id');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('currency');
            $table->unsignedInteger('amount');
            $table->json('response')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('creator_id')
                    ->references('id')->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('donation_id')
                    ->references('id')->on('donations')
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
        Schema::dropIfExists('donates');
    }
}
