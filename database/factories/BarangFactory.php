<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'jenis' => fake()->randomElement(["pakaian", "alat elektronik", "gadget", "alat dapur"]),
            'kondisi' => fake()->randomElement(["baik", "layak", "rusak"]),
            'keterangan' => fake()->paragraph(3),
            'kecacatan' => fake()->sentence(),
            'jumlah' => fake()->randomNumber(3),
        ];
    }
}
