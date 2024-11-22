<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(2, true); // Generate a two-word Hotel name
        return [
            'name' => ucfirst($name),
            'description' => fake()->text(200),
            'location' => fake()->text(25),
            'image' => UploadedFile::fake()->image('hotel_image.jpg', 640, 480), // Random Hotel image URL
            'slug' => Str::slug($name),
        ];
    }
}
