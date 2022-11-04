<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tweet>
 */
class TweetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => $this->faker->id(),
            'user_id' => $this->faker->user_id(),
            'body' => '',
            'created_at' => now(),
            'updated_at' => now(),
            'type' => $this->faker->type(),
            'original_tweet_id' => $this->faker->id(),
        ];
    }
}
