<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class BannerAdsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'image_url' => 'public/banner/' . $this->faker->unique()->word() . 'png',
            'type' => $this->faker->randomElement([0, 1, 2]),
            'status' => $this->faker->randomElement([0, 1, 2]),
            'published_at' => $this->randomDateTime()
        ];
    }

    protected function randomDateTime() {
        $faker = Faker::create();
        $randomDateTime = $faker->dateTimeBetween('now', '+1 week');
        return $randomDateTime->format('Y-m-d H:i:s');
    }
}
