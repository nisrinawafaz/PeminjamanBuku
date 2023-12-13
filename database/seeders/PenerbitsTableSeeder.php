<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenerbitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penerbits')->insert([
            [
                'perusahaan' => 'Gramedia Pustaka Utama',
                'alamat' => 'jakarta',
                'no_handphone' => '081494429402',
                'email' => 'gramedia.pustaka@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'perusahaan' => 'Mizan Publishing',
                'alamat' => 'bandung',
                'no_handphone' => '098194389148',
                'email' => 'mizan.publishing@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'perusahaan' => 'Marvel Comics',
                'alamat' => 'New York',
                'no_handphone' => '098155589148',
                'email' => 'marvel.publishing@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
