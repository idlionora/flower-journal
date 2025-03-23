<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flower>
 */
class FlowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_common' => fake()->unique()->word(),
            'name_species' => fake()->unique()->words(2, true),
            'photo_path' => fake()->file('storage/sample-images', 'storage/app/public', false),
            'photo_title' => fake()->sentence(3),
            'classification_title' => "Taxonomy"
        ];
    }
}
