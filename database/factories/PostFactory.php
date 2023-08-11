<?php

namespace Database\Factories;

use App\Constants\Constants;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tagIds = [];
        for ($i = 1; $i <= $this->faker->numberBetween(1, 10); $i++) { // if seeders will product 10 records in tags table
            $tagIds[] = $i;
        }
        $randomTagIds = implode(',', $tagIds);

        return [
            'category_id' => Category::factory(),
            'tag_ids' => $randomTagIds,
            'slug' => $this->faker->unique()->slug(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'content' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
            'view_count' => $this->faker->randomNumber(4),
            'trending' => $this->faker->randomElement([0, 1]),
            'status' => $this->faker->randomElement([Constants::INACTIVE, Constants::ACTIVE]),
            'published_at' => $this->randomDateTime()
        ];
    }

    protected function randomDateTime() {
        $faker = Faker::create();
        $randomDateTime = $faker->dateTimeBetween('now', '+1 week');
        return $randomDateTime->format('Y-m-d H:i:s');
    }
}
