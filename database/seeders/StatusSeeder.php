<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $status = [
            ['kode_status' => '01',
              'status' => 'cuci'],

            ['kode_status' => '02',
              'status' => 'setrika'],

            ['kode_status' => '03',
              'status' => 'packing'],

            ['kode_status' => '04',
              'status' => 'selesai'],
        ];

        DB::table('status')->insert($status);
    }
}
