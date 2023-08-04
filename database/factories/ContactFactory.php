<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'subject' => $this->faker->sentence(),
            'content' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
            'status' => $this->faker->randomElement([0, 1, 2]),
        ];
    }
}
