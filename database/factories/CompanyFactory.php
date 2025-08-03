<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
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
            'ein' => fake()->numerify('##-#######'),
            'city_id' => fake()->numberBetween(1, 3),
            'user_id' => \App\Models\User::where('role', 'company')->inRandomOrder()->first()->id,
        ];
    }
}
