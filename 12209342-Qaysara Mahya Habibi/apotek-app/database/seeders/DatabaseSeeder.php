<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // menambahkan data ke database tanpa melalui form
        User::create([
            //"fillable => "isian"
            "name" => "Administrator",
            "email" => "admin@gmail.com",
            //
            "password" => Hash::make("adminapotek"),
            "role" => "admin",
        ]);
        User::create([
            "name" => "Kasir Apotek",
            "email" => "kasir@gmail.com",
            //
            "password" => Hash::make("kasirapotek"),
            "role" => "cashier",
        ]);

    }
}
