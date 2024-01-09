<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menambahkan data ke table di database tanpa melalui input form (biasanya untuk data default / bawaan)
        // "fillable" => "isilainnya"
        User::create([
            'name' => 'Rizki',
            'email' => 'admin@gmail.com',
            // hash : enkripsi agar password tersimpan berisi teks acak agar tidak bisa diprediksi / dibaca orang lain
            // Selain hash ada juga (bcrypt)
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Hasan',
            'email' => 'kasir@gmail.com',
            // hash : enkripsi agar password tersimpan berisi teks acak agar tidak bisa diprediksi / dibaca orang lain
            // Selain hash ada juga (bcrypt)
            'password' => Hash::make('kasir'),
            'role' => 'cashier',
        ]);
    }
}
