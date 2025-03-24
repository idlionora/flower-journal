<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FlowerTab>
 */
class FlowerTabFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->words(2, true) . '<br><br>' . fake()->paragraph(5) . '<br><br>' . fake()->word() . '<br><br>' . fake()->paragraph(3, false) . '<br><br>' . fake()->word() . '<br><br>' . fake()->paragraph(6) . '<br><br>' . fake()->words(3, true) . '<br><br>' . fake()->paragraph(5) . '<br><br>' . fake()->word() . '<br><br>' . fake()->paragraph(3, false) . '<br><br>' . fake()->paragraph(5)
        ];
    }
}
