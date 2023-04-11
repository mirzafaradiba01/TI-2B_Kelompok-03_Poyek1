<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->string('kode_status');
            $table->integer('kode_pelanggan')->unsigned();
            $table->integer('kode_order')->unsigned();
            $table->integer('kode_user')->unsigned();
            $table->string('status')->nullable();
            $table->timestamps();

            // $table->foreign('kode_pelanggan')->references('kode_pelanggan')->on('pelanggan');
            // $table->foreign('kode_order')->references('kode_order')->on('order');
            // $table->foreign('kode_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status');
    }
};
