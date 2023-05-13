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
        Schema::table('status', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pelanggan')->after('id');
            $table->unsignedBigInteger('id_jenis_laundry')->after('id_pelanggan');
            $table->unsignedBigInteger('id_order')->after('id_jenis_laundry');

            $table->foreign('id_pelanggan')->references('id')->on('pelanggan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_jenis_laundry')->references('id')->on('jenis_laundry')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_order')->references('id')->on('order')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('relasi_status');
    }
};
