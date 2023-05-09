<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event::class>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>s
     */
    public function definition(): array
    {
        $array = ['online', 'offline'];
        $enums = $array[rand(0, 1)];
        return [
            'venue' => $enums,
            'city' => $this->faker->city,
            'games' => $this->faker->word,
            'visitors' => $this->faker->numberBetween(1, 100),
            'spk' => $this->faker->word,
            'live_data' => $enums === 'online' ? $this->faker->url : null,
        ];
    }
}
