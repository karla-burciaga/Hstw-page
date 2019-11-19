<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => 'Prueba',
            'slug' => 'prueba',
            'post_category_id' => 1,
            'post_subcategory_id' => 1,
        ]);
    }
}
