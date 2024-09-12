<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'photo_description' => $this->faker->paragraph(), // Example: "A beautiful sunset."
            'photo_comment' => $this->faker->sentence(), // Example: "Great colors and composition."
            'Upload_time' => $this->faker->dateTime(), // Random datetime
            'gallery_id' =>  Gallery::inRandomOrder()->first()->id ?? Gallery::factory(), // Existing gallery or new one
            'path' => $this->faker->imageUrl(640, 480, 'photos', true), // Generates a random photo URL
        ];
    }
}
