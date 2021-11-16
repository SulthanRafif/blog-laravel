<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Blogs;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
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
            'identifier' => strtolower(Str::random(32)),
            'judul' => $this->faker->unique()->text(10),
            'body' => $this->faker->sentence(),
        ];
    }
}
