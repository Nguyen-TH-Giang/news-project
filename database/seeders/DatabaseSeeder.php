<?php

namespace Database\Seeders;

use App\Models\Banner_ad;
use App\Models\Category;
use App\Models\Contact;
use App\Models\General;
use App\Models\Newsletter_subscription;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::factory(3)->create();
        Post::factory(30)->create(fn () => [
            'category_id' => $categories->random()->id,
        ]);
        Tag::factory(10)->create();
        Banner_ad::factory(10)->create();
        Contact::factory(10)->create();
        General::factory(1)->create();
        Newsletter_subscription::factory(10)->create();
        User::factory(1)->create();
    }
}
