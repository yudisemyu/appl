<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(), // Buat user otomatis
            'nama' => $this->faker->word(), // contoh: "Python", "Teamwork"
            'kategori' => $this->faker->randomElement(['Hard Skill', 'Soft Skill']),
            'level' => $this->faker->randomElement(['Beginner', 'Intermediate', 'Expert']),
        ];
    }
}
