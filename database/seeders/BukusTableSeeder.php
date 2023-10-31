<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bukus')->insert([
            [
                'idPenulis' => 1,
                'idPenerbit' => 1,
                'idGenre' => 1,
                'judul' => 'halo',
                'tahun_terbit' => '2019',
                'deskripsi' => 'buku pelajaran',
                'path_file' => 'coba.jpg',
                'stok' => 2,
                'harga_harian' => 7000,
                'gambar_cover' => 'coba.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idPenulis' => 2,
                'idPenerbit' => 2,
                'idGenre' => 2,
                'judul' => 'bandung',
                'tahun_terbit' => '2022',
                'deskripsi' => 'buku sejarah',
                'path_file' => 'coba1.jpg',
                'stok' => 3,
                'harga_harian' => 9000,
                'gambar_cover' => 'coba1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}