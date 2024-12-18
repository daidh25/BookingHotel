<?php

namespace Database\Factories;

use Carbon\Carbon;
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
    public function definition()
    {
        return [
            'name' => fake()->text(20),
            'city' => fake()->city(),
            'country' => fake()->country(),
            'description' => fake()->text(),
            'check_in_date' => Carbon::now(),
            'num_guest' => rand(10, 30),
            'price' => rand(10, 999),
            'image1' => 'uploads/images/hotels/rome1.webp',
            'image2' => 'uploads/images/hotels/rome2.webp',
            'image3' => 'uploads/images/hotels/rome3.webp',
            'owner_id' => rand(6, 7),
            'admin_accepted' => rand(0, 1)
        ];
    }
}
