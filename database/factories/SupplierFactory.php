<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_supplier' => $this->faker->name(),
            'jenis_supplier' => $this->faker->word(),
            'alamat_supplier' => $this->faker->streetAddress(),
            'no_telp' => $this->faker->phoneNumber(),
        ];
    }
}
