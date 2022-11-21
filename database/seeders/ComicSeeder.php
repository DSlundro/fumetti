<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        for($i=0; $i<40; $i++) {
            DB::table('comics')->insert([
                'title' => Str::random(30),
                'serie' => Str::random(10),
                'description' => Str::random(255),
                'cover' => 'https://picsum.photos/id/'.rand(1, 400).'/200/300'
            ]);
        };
    }
}
