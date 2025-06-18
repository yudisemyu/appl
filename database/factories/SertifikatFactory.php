<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sertifikat>
 */
class SertifikatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'judul' => $this->faker->sentence(3), // contoh: "Web Development Bootcamp"
            'penyelenggara' => $this->faker->company(), // contoh: "Dicoding"
            'tanggal' => $this->faker->date(),
            'file_path' => 'sertifikats/' . $this->faker->unique()->uuid() . '.' . $this->faker->randomElement(['pdf', 'jpg', 'png']),
        ];
    }
}
