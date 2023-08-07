<?php

namespace Database\Seeders;

use App\Models\BannerAds;
use App\Models\Category;
use App\Models\Contact;
use App\Models\General;
use App\Models\NewsletterSubscriptions;
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
        BannerAds::factory(10)->create();
        Contact::factory(10)->create();
        General::factory(1)->create();
        NewsletterSubscriptions::factory(10)->create();
        User::factory(1)->create();
    }
}
