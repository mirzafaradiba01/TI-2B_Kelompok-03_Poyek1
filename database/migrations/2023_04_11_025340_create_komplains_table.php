<?php

use App\Models\Pelanggan;
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
        Schema::create('komplain', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('kode_komplain');
            $table->unsignedInteger('kode_pelanggan')->unsigned();
            $table->unsignedInteger('kode_order')->unsigned();
            $table->string('pesan')->nullable();
            $table->string('gambar')->nullable();
            $table->string('balasan')->nullable();
            $table->timestamps();

            // $table->foreign('kode_pelanggan')->references('kode_pelanggan')->on('pelanggan');
            // $table->foreign('kode_order')->references('kode_order')->on('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komplain');
    }
};
