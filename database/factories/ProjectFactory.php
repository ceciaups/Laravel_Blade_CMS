<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'url' => $this->faker->url,
            'github' => $this->faker->url,
            'content' => $this->faker->paragraph,
            'user_id' => User::all()->random(),
        ];
    }

}
