<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'gallery_description' => $this->faker->paragraph(), 
            'gallery_comments' => $this->faker->paragraph(),
            'thumbnail' => $this->faker->imageUrl(640, 480, 'nature', true), 
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(), // Existing user or new user
            'thumbnail'=>$this->faker->imageUrl(640, 480, 'nature', true, 'Faker'),
        ];
    }
}