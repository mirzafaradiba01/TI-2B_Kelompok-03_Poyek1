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
    public function up() {

        // tabel ini akan berelasi dengan tabel pelanggan dan order
        Schema::create('komplain', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_komplain')->unsigned();
            $table->string('pesan')->nullable();
            $table->string('gambar')->nullable();
            $table->string('balasan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('komplain');
    }
};
