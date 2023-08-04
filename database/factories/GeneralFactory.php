<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GeneralFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'logo' => 'public/banner/' . $this->faker->unique()->word() . 'png',
            'description' => '<p>' . implode('</p><p>', $this->faker->paragraphs(1)) . '</p>',
            'contact_name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'fb_link' => 'https://www.facebook.com/fb_link/',
            'instagram_link' => 'https://www.instagram.com/instagram_link/',
        ];
    }
}
