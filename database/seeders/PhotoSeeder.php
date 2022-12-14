<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Seeder;


class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 50; $i++) { 
            $photo = new Photo();
            $photo->comic_id = rand(1, 35);
            $photo->link = 'https://picsum.photos/id/'.rand(1, 400).'/200';
            $photo->save();
        };
    }
}
