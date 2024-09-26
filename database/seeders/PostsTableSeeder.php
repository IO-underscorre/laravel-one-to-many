<?php

namespace Database\Seeders;

use App\Functions\Helper;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 200; $i++) {

            $new_post = new Post();

            $new_post->title = $faker->sentence();
            $new_post->slug = Helper::generateSlug($new_post->title, Post::class);
            $new_post->body = $faker->paragraph();
            $new_post->reading_time = Helper::getReadingTime($new_post->body);
            $new_post->is_archived = false;

            $new_post->save();
        }
    }
}
