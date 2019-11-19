<?php

use App\PostCategory;
use Illuminate\Database\Seeder;

class PostCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostCategory::create([
           'title' => 'Prueba',
           'slug' => 'prueba',
        ]);
    }
}
