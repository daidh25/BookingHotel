<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInfo>
 */
class UserInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'first_name' => 'Tommy',
            'last_name' => 'Shelby',
            'dob' => fake()->date(),
            'address' => fake()->address(),
            'phone_number' => fake()->phoneNumber()
        ];
    }
}
