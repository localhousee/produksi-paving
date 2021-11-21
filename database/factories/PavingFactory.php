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
            'stok_biji' => $this->faker->randomNumber(3),
            'ukuran' => $this->faker->randomElement(['S', 'M', 'L']),
            'harga_satuan' => $this->faker->randomNumber(5, true),
            'deskripsi' => $this->faker->sentence(3),
            'satuan' => $this->faker->randomLetter(),
            'gambar' => null,
            'jumlah_per_palet' => $this->faker->randomDigitNotNull(),
        ];
    }
}
