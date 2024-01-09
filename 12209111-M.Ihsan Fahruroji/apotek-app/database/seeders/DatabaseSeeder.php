<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
//import agar hash bisa digunakan
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        //menambahkan data ke table di database tanpa melalui input form (biasanya untuk
        // data data default/bawaan)
        User::create([
            "name" => "Administrator",
            "email" => "admin@gmail.com",
            //hash : enskripisi agar password tersimpan berisi tesk acak agar tidak bisa
            // diprediksi/dibaca orang lain
            //hash -> bcrypt
            "password" => Hash::make("adminapotek"),
            "role" => "admin",
        ]);
        User:: create([
            "name" => "Kasir apotek",
            "email" => "kasir@gmail.com",
            "password" => Hash::make("kasirapotek"),
            "role" => "cashier",
        ]);
    }
}
