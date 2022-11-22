<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comic>
 */
class ComicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->sentence(),
            'serie' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker()->text(),
            'cover' => $this->faker()->imageUrl(640, 480),
            'user_id' => $this->faker()->numberBetween(1, 2)
        ];
    }
}
