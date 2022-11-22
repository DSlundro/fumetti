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
        for ($i=1; $i < 15; $i++) { 
            $comic = new Comic();
            $comic->user_id = rand(1, 5);
            $comic->serie_id = rand(1, 5);
            $comic->photo_id = rand(1, 50);
            $comic->title = 'Title'.$i;
            $comic->description = Str::random(255);
            $comic->save();
        };
    }
}