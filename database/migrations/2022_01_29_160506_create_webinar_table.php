<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('webinar_status');
            $table->string('title');
            $table->string('instructors');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->string('video')->nullable();
            $table->integer('kuota')->nullable();
            $table->integer('tanggal')->nullable();
            $table->integer('waktu')->nullable();
            // $table->string('price')->nullable();
            $table->longText('note')->nullable();
            $table->longText('lokasi')->nullable();
            $table->longText('information')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webinar');
    }
}
