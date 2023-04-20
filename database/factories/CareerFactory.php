<?php

namespace Database\Factories;

use App\Models\CareerType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Career>
 */
class CareerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'career' => $this->faker->sentence,
            'location' => $this->faker->address,
            'start_date' => $this->faker->dateTimeThisMonth,
            'end_date' => $this->faker->dateTimeThisMonth,
            'career_type_id' => CareerType::all()->random(),
            'photo' => $this->faker->image,
        ];
    }
}
