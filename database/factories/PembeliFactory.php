<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PembeliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->streetAddress(),
            'no_telp' => $this->faker->phoneNumber(),
        ];
    }
}
