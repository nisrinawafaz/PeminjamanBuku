<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     * 
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'fauuuuuza',
            'email' => 'fauzaanylsn@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('fauuuuuzuaada'), // Ganti 'password' dengan kata sandi yang diinginkan
            'user_image' => 'default.jpg', // Ganti 'default.jpg' dengan nama file gambar default
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
                'name' => 'nisrina',
                'email' => 'nisrina.wafa@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('ninisssss'), // Ganti 'password' dengan kata sandi yang diinginkan
                'user_image' => 'default.jpg', // Ganti 'default.jpg' dengan nama file gambar default
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
