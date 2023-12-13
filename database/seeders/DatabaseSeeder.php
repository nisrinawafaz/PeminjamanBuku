<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //$this->call(UsersTableSeeder::class);
        //$this->call(PenerbitsTableSeeder::class);
        //$this->call(GenresTableSeeder::class);
        $this->call(PenulisTableSeeder::class);
        //$this->call(BukusTableSeeder::class);
        //$this->call(HistoryPeminjamanTableSeeder::class);
    }
}
