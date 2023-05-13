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

        // tabel ini akan berelasi dengan tabel pelanggan
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 25)->nullable();
            $table->string('email')->unique();
            $table->enum('role', ['admin', 'petugas', 'pelanggan'])->default('pelanggan');
            $table->string('password')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
};
