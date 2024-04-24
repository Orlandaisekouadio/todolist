<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    
    public function definition(): array
    {
        return [
            //Les différents attributs
            "title" => $this->faker->sentence(3, true),
            "description" => $this->faker->paragraph(2, true),
            "state" => $this->faker->randomElement(["En cours", "Terminé"]),
        ];
    }
}
