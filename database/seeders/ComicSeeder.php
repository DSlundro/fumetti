<?php

namespace Database\Seeders;

use App\Models\Comic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 10; $i++) { 
            $comic = new Comic();
            $comic->user_id = rand(1, 5);
            $comic->title = Str::random(25);
            $comic->serie = rand(1, 5);
            $comic->description = Str::random(255);
            $comic->cover = 'https://picsum.photos/id/'.rand(100, 400).'/200';
            $comic->save();
        };
    }
}
