<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAksesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_role_id');
            $table->foreign('user_role_id')->references('id')->on('user_roles');
            $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id')->references('id')->on('menu');

            $table->integer('akses');
            $table->integer('tambah');
            $table->integer('edit');
            $table->integer('hapus');

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
        Schema::dropIfExists('akses');
    }
}
