<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'Mirza Priscilla Faradiba',
                'email' => 'mirzapriscilla5@gmail.com',
                'password' => Hash::make('12345')
            ], [
                'username' => 'Shofiatul Ayu A',
                'email' => 'shofiaaayuu@gmail.com',
                'password' => Hash::make('54321')
            ], [
                'username' => 'angga',
                'email' => 'angga@gmail.com',
                'password' => Hash::make('13579')
            ]
         ]);
    }
}
