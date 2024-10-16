<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vegetable>
 */
class VegetableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique->word();
        $classification = $this->faker->word();
        $description = $this->faker->paragraph();
        $edible = $this->faker->boolean();

        return [
            'name' => $name,
            'classification' => $classification,
            'description' => $description,
            'edible' => $edible
        ];
    }
}
