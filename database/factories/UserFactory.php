<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jurusanNames = [
            'Teknik Informatika',
            'Sistem Informasi',
            'Akuntansi',
            'Manajemen',
            'Ilmu Komunikasi',
            'Hukum',
            'Kedokteran',
            'Arsitektur',
            'Desain Komunikasi Visual',
            'Psikologi',
            'Matematika',
            'Fisika',
            'Kimia',
            'Biologi',
            'Pendidikan Guru SD',
            'Sastra Inggris',
            'Bahasa Indonesia',
            'Agroteknologi',
            'Ilmu Sejarah',
            'Hubungan Internasional',
        ];

        $kampusNames = [
            'Universitas Budi Luhur',
            'Universitas Gadjah Mada',
            'Institut Teknologi Bandung',
            'Universitas Indonesia',
            'Universitas Diponegoro',
            'Universitas Hasanuddin',
            'Universitas Padjadjaran',
            'Universitas Airlangga',
            'Universitas Sebelas Maret',
            'Universitas Brawijaya',
        ];

        $namaJurusan = $this->faker->unique()->randomElement($jurusanNames);

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'jurusan' => $namaJurusan,
            'kampus' => $this->faker->randomElement($kampusNames),
            'no_hp' => fake()->phoneNumber(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
