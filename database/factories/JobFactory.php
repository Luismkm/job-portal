<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'description' => fake()->paragraph(),
            'key_responsibilities' => json_encode(fake()->sentences(5)),
            'professional_skills' => json_encode(fake()->words(5)),
            'experience' => fake()->word(),
            'degree' => fake()->word(),
            'tag' => json_encode(fake()->words(3)),
            'salary' => fake()->randomFloat(2, 2000, 12000),
            'period' => fake()->word(),
            'status' => fake()->randomElement(['ativado', 'inativado']),
            'category' => fake()->word(),
            'city_id' => fake()->numberBetween(1, 3),
            'company_id' => \App\Models\Company::inRandomOrder()->first()->id,
        ];
    }
}
