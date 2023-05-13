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
    public function up() {

        // tabel ini akan berelasi dengan tabel user
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_pelanggan')->unique();
            $table->string('nama_pelanggan',50)->nullable();
            $table->string('no_hp',13)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('pelanggan');
    }
};
