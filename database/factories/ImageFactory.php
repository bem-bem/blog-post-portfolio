<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $dummyImages = [
            '1.jpeg',
            '2.jpg',
            '3.jpeg',
            '4.jpeg',
            '5.jpeg',
            '6.jpeg',
            '7.jpeg',
            '8.jpeg',
            '9.jpeg',
            '10.jpeg'
        ];
        return [
            'path' => 'factory-mages/' . $this->faker->randomElement($dummyImages),
        ];
    }
}
