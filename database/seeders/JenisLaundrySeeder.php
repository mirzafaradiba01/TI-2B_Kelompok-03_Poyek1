<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisLaundrySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $jenis = [
            ['kode_jenis_laundry' => '01',
              'nama' => 'Reguler',
              'biaya' => '5000'],

            ['kode_jenis_laundry' => '02',
              'nama' => 'Express',
              'biaya' => '8000'],
            
            ['kode_jenis_laundry' => '03',
              'nama' => 'Kilat',
              'biaya' => '12000'],

        ];

        DB::table('jenis_laundry')->insert($jenis);
    }
}
