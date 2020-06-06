<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
            'content' => '2 this is the comment 1',
            'user_id' => 1,
            'post_id' => 1,
        ]);
        Comment::create([
            'content' => '2 this is the comment 2',
            'user_id' => 1,
            'post_id' => 2,
        ]);
        Comment::create([
            'content' => '3 this is the comment 3',
            'user_id' => 1,
            'post_id' => 3,
        ]);
        Comment::create([
            'content' => '33 this is the comment 33',
            'user_id' => 1,
            'post_id' => 3,
        ]);
    }
}
