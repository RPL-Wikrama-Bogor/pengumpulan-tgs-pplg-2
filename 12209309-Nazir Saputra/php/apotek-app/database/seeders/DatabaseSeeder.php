<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
// import agar hash dapat digunakan


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

        // menambahkan data ke table di database tanpa melalui input form (biasanya data-data default/bawaan)
        // "fillable" => "isianya"
        User::create([
            "name" => "Administator1",
            "email" => "apotek__admin1@gmail.com",
            // hash : enkripsi agar password tersimpan berisi teks acak agar tidak bisa diprediksi/dibaca orang laim
            // hash => bcrypt
            "password" => Hash::make("adminapotek"),
            "role" => "admin",
        ]);
        User::create([
            "name" => "Kasir apotek1",
            "email" => "kasir1@gmail.com",
            "password" => Hash::make("kasirapotek"),
            "role" => "cashier",
        ]);
    }
}
