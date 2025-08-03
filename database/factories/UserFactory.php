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
    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'avatar' => fake()->url(),
            'token' => Str::random(60),
            'email_verified_at' => fake()->date(),
            'status' => fake()->randomElement(['ativado']),
            'role' => fake()->randomElement(['employee', 'company', 'human_resource']),
            'permission' => json_encode(fake()->word())
        ];
    }
}
