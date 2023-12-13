<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenulisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penulis')->insert([
            [
                'nama_lengkap' => 'Andrea Hirata',
                'domisili' => 'Belitung',
                'tanggal_lahir' => '24-10-1966',
                'email' => 'andrea.hirata@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Tere Liye',
                'domisili' => 'Jakarta',
                'tanggal_lahir' => '21-05-1979',
                'email' => 'tere.liye@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Haidar Musyafa',
                'domisili' => 'Sleman',
                'tanggal_lahir' => '29-06-1986',
                'email' => 'haidar.musyafa@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Pidi Baiq',
                'domisili' => 'Bandung',
                'tanggal_lahir' => '08-08-1972',
                'email' => 'pidi.baiq@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Ika Natassa',
                'domisili' => 'Medan',
                'tanggal_lahir' => '25-12-1977',
                'email' => 'ika.natassa@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Erisca Febriani',
                'domisili' => 'Lampung',
                'tanggal_lahir' => '25-03-1998',
                'email' => 'erisca.febriani@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Ayu Utami',
                'domisili' => 'Jakarta',
                'tanggal_lahir' => '21-11-1968',
                'email' => 'ayu.utami@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Ahmad Fuadi',
                'domisili' => 'Sumatera',
                'tanggal_lahir' => '30-12-1973',
                'email' => 'tere.liye@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Eka Kurniawan',
                'domisili' => 'Yogakarta',
                'tanggal_lahir' => '28-12-1975',
                'email' => 'eka.kurniawan@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Dewi Lestari',
                'domisili' => 'Jakarta',
                'tanggal_lahir' => '20-01-1976',
                'email' => 'dewi.lestari@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
