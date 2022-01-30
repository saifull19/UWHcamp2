<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderWebinarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_webinar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id')->nullable();
            $table->foreign('member_id')->references('id')->on('users');
            $table->unsignedBigInteger('webinar_id')->nullable();
            $table->foreign('webinar_id')->references('id')->on('webinar');
            $table->longText('file')->nullable();
            $table->longText('note')->nullable();
            $table->date('expired')->nullable();
            // $table->integer('order_status_id')->nullable();
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
        Schema::dropIfExists('order_webinar');
    }
}
