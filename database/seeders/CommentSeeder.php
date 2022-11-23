<?php

namespace Database\Seeders;

use App\Models\Comment;
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
        for ($i=1; $i <= 200; $i++) { 
            $comment = new Comment();
            $comment->user_id = rand(1, 5);
            $comment->comic_id = rand(1, 35);
            $comment->text = 'Comment'.$i;
            $comment->save();
        };
    }
}
