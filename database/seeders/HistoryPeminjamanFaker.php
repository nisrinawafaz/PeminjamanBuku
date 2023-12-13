<?php
// HistoryPeminjamanFactory.php

namespace Database\Factories;

use App\Models\History_Peminjaman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class HistoryPeminjamanFactory extends Factory
{
    protected $model = History_Peminjaman::class;

    public function definition()
    {
        $tglPeminjaman = $this->faker->dateTimeThisMonth();
        $tglPengembalian = $this->faker->dateTimeBetween($tglPeminjaman, '+7 days'); // Maksimal 7 hari setelah tgl_Peminjaman

        return [
            'idBuku' => $this->faker->numberBetween(1, 10),
            'idUser' => $this->faker->numberBetween(1, 10),
            'tgl_Peminjaman' => $tglPeminjaman,
            'tgl_Pengembalian' => $tglPengembalian,
            'total_pembayaran' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
