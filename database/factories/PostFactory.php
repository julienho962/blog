<?php

namespace Database\Factories;

use App\Models\Category;
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
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence(),
            'excerpt' => '<p>' . $this->faker->paragraph(2) . '</p>',
            'slug' => $this->faker->slug(),
            'body' => '<p>' .  $this->faker->paragraph(8) . '</p>'

        ];
    }
}
