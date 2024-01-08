<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
//import agar hash dpt digunakan
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // menambahkan data ke table di database tanpa melalui input form (biasanya untuk data-data default/bawaan)
        User::create([
            "name" => "Administrator",
            "email" => "admin@gmail.com",
            // has : enkripsi agar pw tersimpan berisi text acak agar tidak bisa dipresiksi/dibaca orang lain
            // hash = laravel 7 dan seterusnya -> bcrypt = laravel 1.sd 6
            // bc
            "password" => Hash::make("adminapotek"),
            "role" => "admin",
        ]);
             User::create([
                "name" => "Kasir Apotek",
                "email" => "kasir@gmail.com",
                "password" => bcrypt("kasirapotek"),
                "role" => "cashier",
             ]);
    }
}
