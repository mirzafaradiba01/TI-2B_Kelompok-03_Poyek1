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

        // tabel ini berelasi dengan tabel status
        Schema::create('jenis_laundry', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_jenis_laundry')->unique();
            $table->string('nama')->nullable();
            $table->unsignedBigInteger('biaya')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('jenis_laundrie');
    }
};
