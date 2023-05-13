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

        // tabel ini akan berelasi dengan tabel status
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_order')->unsigned()->unique();
            $table->date('tanggal_laundry')->nullable();
            $table->unsignedBigInteger('berat' )->nullable();
            $table->unsignedBigInteger('total')->nullable();
            $table->string('catatan')->nullable();
            $table->string('status_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('order');
    }
};
