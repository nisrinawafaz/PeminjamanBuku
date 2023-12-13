<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Data statis
        DB::table('genres')->insert([
            [
                'nama_genre' => 'romantic',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_genre' => 'horror',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Data dengan Faker
        for ($i = 0; $i < 10; $i++) {
            DB::table('genres')->insert([
                'nama_genre' => $faker->word,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
