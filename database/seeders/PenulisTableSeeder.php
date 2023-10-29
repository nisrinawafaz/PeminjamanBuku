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
            ]
        ]);
    }
}
