<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BukusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('bukus')->insert([
                'idPenulis' => $faker->numberBetween(1, 10),
                'idPenerbit' => $faker->numberBetween(1, 10),
                'idGenre' => $faker->numberBetween(1, 10),
                'judul' => $faker->sentence,
                'tahun_terbit' => $faker->year,
                'deskripsi' => $faker->paragraph,
                'path_file' => 'coba.jpg',
                'stok' => $faker->numberBetween(1, 50),
                'harga_harian' => $faker->numberBetween(5000, 20000),
                'gambar_cover' => $faker->randomElement(['coba.jpg', 'coba1.jpg']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
