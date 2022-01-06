<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'document' => $this->faker->randomElement(['RUC', 'CEDULA']),
            'num_document' => $this->faker->unique()->ruc(),
            'fullname' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'dni_pasaporte' => $this->faker->unique()->dni,
            'telefono' => $this->faker->unique()->phoneNumber,
            'direccion' => $this->faker->unique()->address,
            'password' => bcrypt('123456'),
        ];
    }
}