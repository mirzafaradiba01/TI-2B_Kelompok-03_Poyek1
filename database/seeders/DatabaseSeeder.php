<?php

namespace Database\Seeders;

use App\Models\JenisLaundry;
use App\Models\Order;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        // gunakan fungsi ini agar mengisi data tanpa menuliskan nama seedernya
        $this->call([UserSeeder::class]);
    }
}
