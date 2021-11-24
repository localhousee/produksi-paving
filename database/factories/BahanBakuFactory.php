<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BahanBakuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jenis' => $this->faker->unique()->randomElement(['abu batu', 'semen']),
            'merk' => $this->faker->company(),
            'harga' => $this->faker->randomNumber(4, true),
            'stok' => $this->faker->randomNumber(3, true),
            'satuan' => $this->faker->randomElement(['sak', 'm3']),
        ];
    }
}
