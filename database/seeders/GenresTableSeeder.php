<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            [
                'nama_genre' => 'romantic',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_genre' => 'horor',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
