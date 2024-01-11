<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
// import agar hash dpt digunakan
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // menambahkan data ke table di database tanpa melalui form (biasanya untuk data data default/bawaan )
        User::create([
            "name" => "Administrator",
            "email" => "admin@gmail.com",
            // hash enkripsi agar password tersimpan berisi teks acak agar tidak bisa di prediksi/dibaca orang lain
            "password" => Hash::make("adminapotek"),
            "role" => "admin",
        ]);
        User::create([
            "name" => "Kasir Apotek",
            "email" => "kasir@gmail.com",
            "password" => Hash::make("kasirapotek"),
            "role" => "cashier",
        ]);
    }
}
