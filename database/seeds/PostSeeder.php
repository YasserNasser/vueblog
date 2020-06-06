<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => 'a simple title',
            'slug' => Str::slug('a simple title'),
            'body' => 'lorem ipsum dolor fake data for the post content',
            'image' => 'p1.jpg',
            'user_id' => 1,
            'category_id' => 2,
        ]);
        Post::create([
            'title' => 'post 2 a simple title 2',
            'slug' => Str::slug('post 2 a simple title 2'),
            'body' => 'post 2 a simple title 2 lorem ipsum dolor fake data for the post content',
            'image' => 'p2.jpg',
            'user_id' => 1,
            'category_id' => 1,
        ]);
        Post::create([
            'title' => 'post 3 a simple title 3',
            'slug' => Str::slug('post 3 a simple title 3'),
            'body' => 'post 3 a simple title 3 lorem ipsum dolor fake data for the post content',
            'image' => 'p3.jpg',
            'user_id' => 1,
            'category_id' => 1,
        ]);
        Post::create([
            'title' => 'post 4 a simple title 4',
            'slug' => Str::slug('post 4 a simple title 4'),
            'body' => 'post 4 a simple title 4 lorem ipsum dolor fake data for the post content',
            'image' => 'p1.jpg',
            'user_id' => 1,
            'category_id' => 3,
        ]);
        Post::create([
            'title' => 'post 5 a simple title 5',
            'slug' => Str::slug('post 5 a simple title 5'),
            'body' => 'post 5 a simple title 5 lorem ipsum dolor fake data for the post content',
            'image' => 'p2.jpg',
            'user_id' => 1,
            'category_id' => 2,
        ]);
        Post::create([
            'title' => 'post 6 a simple title 6',
            'slug' => Str::slug('post 6 a simple title 6'),
            'body' => 'post 6 a simple title 6 lorem ipsum dolor fake data for the post content',
            'image' => 'p3.jpg',
            'user_id' => 1,
            'category_id' => 1,
        ]);
    }
}
