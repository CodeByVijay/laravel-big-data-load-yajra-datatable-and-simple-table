<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text,
            'user_id'=> User::all()->random()->id,
            'slug' => $this->faker->slug,
            'keywords' => $this->faker->text,
            'description' => $this->faker->text,
            'content' => $this->faker->paragraph,
        ];
    }
}
