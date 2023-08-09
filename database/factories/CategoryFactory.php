<?php

namespace Database\Factories;

use App\Constants\Constants;
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
        if ($id == 2) {
            $parent_id = $this->faker->optional(0.4, null)->numberBetween(1, $id - 1);
        }

        $category = [
            'id' => $id,
            'parent_id' => $parent_id,
            'name' => $this->faker->unique()->word(),
            'slug' => $this->faker->unique()->slug(),
            'sort_order' => $this->faker->randomNumber(1),
            'status' => $this->faker->randomElement([Constants::INACTIVE, Constants::ACTIVE]),
        ];
        $id++;
        return $category;
    }
}
