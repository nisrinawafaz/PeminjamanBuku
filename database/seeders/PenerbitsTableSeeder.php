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
                'alamat' => 'Jakarta',
                'no_handphone' => '081494429402',
                'email' => 'gramedia.pustaka@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'perusahaan' => 'Mizan Publishing',
                'alamat' => 'Bandung',
                'no_handphone' => '098194389148',
                'email' => 'mizan.publishing@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'perusahaan' => 'Bukunesia',
                'alamat' => 'Yogyakarta',
                'no_handphone' => '08112831577',
                'email' => 'bukunesia@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'perusahaan' => 'Deepublish',
                'alamat' => 'Yogyakarta',
                'no_handphone' => '02742836082',
                'email' => 'deepublish@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'perusahaan' => 'Grasindo',
                'alamat' => 'Jakarta',
                'no_handphone' => '02153650110',
                'email' => 'grasindo@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'perusahaan' => 'Bentang Pustaka',
                'alamat' => 'Yogyakarta',
                'no_handphone' => '02747370635',
                'email' => 'bentang.pustaka@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'perusahaan' => 'Falcon Publishing',
                'alamat' => 'Jakarta',
                'no_handphone' => '0217974970',
                'email' => 'falcon.publishing@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'perusahaan' => 'Diva Press',
                'alamat' => 'Yogyakarta',
                'no_handphone' => '081804374879',
                'email' => 'diva.press@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'perusahaan' => 'Republika',
                'alamat' => 'Jakarta',
                'no_handphone' => '02287243363',
                'email' => 'republika@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'perusahaan' => 'Erlangga',
                'alamat' => 'Jakarta',
                'no_handphone' => '081911500885',
                'email' => 'erlangga@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
