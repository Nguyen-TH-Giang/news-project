<?php

namespace Database\Factories;

use App\Constants\Constants;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = [
            'parent_id' => Category::whereNull('parent_id')->inRandomOrder()->value('id'),
            'name' => $this->faker->unique()->word(),
            'slug' => $this->faker->unique()->slug(),
            'image_url' => 'category/' . $this->faker->unique()->word() . '.png',
            'sort_order' => $this->faker->randomNumber(1),
            'status' => $this->faker->randomElement([Constants::INACTIVE, Constants::ACTIVE]),
        ];

        return $category;
    }
}
