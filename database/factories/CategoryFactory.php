<?php

namespace Database\Factories;

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
        static $id = 1;
        $parent_id = $this->faker->optional($weight = 0.4, $default = null)->numberBetween(1, $id - 1);
        $category = [
            'id' => $id,
            'parent_id' => $parent_id,
            'name' => $this->faker->unique()->word(),
            'slug' => $this->faker->unique()->slug(),
            'sort_order' => $this->faker->randomNumber(1),
            'status' => $this->faker->randomElement([0, 1, 2]),
        ];
        $id++;
        return $category;
    }
}
