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
                'nama_genre' => 'Fantasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_genre' => 'Romantis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_genre' => 'Aksi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_genre' => 'Horor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_genre' => 'Komedi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_genre' => 'Science Fiction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_genre' => 'Fan Fiction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_genre' => 'Misteri',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_genre' => 'Thriller',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_genre' => 'Petualangan',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
