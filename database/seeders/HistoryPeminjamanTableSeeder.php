<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HistoryPeminjamanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 1000; $i++) {
            $tglPeminjaman = $faker->date;
            $tglPengembalian = $faker->dateTimeBetween($tglPeminjaman, '+7 days')->format('Y-m-d');

            DB::table('history_peminjaman')->insert([
                'idPeminjaman' => $i,
                'idBuku' => $faker->numberBetween(1, 10),
                'idUser' => $faker->numberBetween(1, 10),
                'tgl_peminjaman' => $tglPeminjaman,
                'tgl_pengembalian' => $tglPengembalian,
                'total_pembayaran' => $faker->numberBetween(5000, 20000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
