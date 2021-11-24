<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PavingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jenis' => $this->faker->firstName(),
            'stok' => $this->faker->randomNumber(3),
            'ukuran' => $this->faker->randomLetter(),
            'harga' => $this->faker->randomNumber(4, true),
            'deskripsi' => $this->faker->sentence(3),
            'satuan' => $this->faker->randomLetter(),
            'gambar' => null,
        ];
    }
}
