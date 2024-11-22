<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Unique;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // public function definition(): array
    // {
    //     return [
    //         'name' => fake()->sentence(),
    //         'slug' => fn(array $attributes) => Str::slug($attributes['name']),
    //         'image' => fake()->randomElement(['public/assets-front/images/image_2.jpg']),
    //         'price' => rand(500),
    //         'size' => rand(100),
    //         'num_persons' => rand(5),
    //         'view' => fake()->text(10),
    //         'hotel_id' =>


    //     ];
    // }
    public function definition()
    {
        $name = $this->faker->words(2, true); // Generate a two-word room name
        return [
            'name' => ucfirst($name),
            'price' => $this->faker->randomFloat(2, 50, 500), // Random price between 50 and 500
            'size' => $this->faker->numberBetween(15, 100), // Random size in sqm
            'num_persons' => rand(1, 4),
            'num_beds' => rand(1, 4),
            'view' => fake()->text(100),
            'image' => $this->faker->imageUrl(640, 480, 'room', true), // Random room image URL
            'slug' => Str::slug($name),
            'status' => $this->faker->randomElement(['available', 'booked']),
            'hotel_id' => \App\Models\Hotel::factory(), // Assumes a Hotel factory exists
        ];
    }
}
