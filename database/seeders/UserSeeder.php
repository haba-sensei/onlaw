<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            "document" => "RUC",
            "num_document" => "9999999999",
            "fullname" => "Haba",
            "email" => "admin@onlaw.com",
            "dni_pasaporte" => "9999999999",
            "telefono" => "999999999",
            "direccion" => "9999999999",
            "password" => bcrypt("123456"),
        ])->assignRole('Admin');

        User::factory(2)->create()->each(function ($user) {
            $user->assignRole('Abogado');
        });

        User::factory(4)->create()->each(function ($user) {
            $user->noveno_numero = rand('1', '9');
            $user->assignRole('Cliente');
            $user->save();
        });
    }
}