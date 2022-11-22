<?php

namespace Database\Seeders;

use App\Models\Serie;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 5; $i++) { 
            $serie = new Serie();
            $serie->name = 'Serie'.$i;
            $serie->save();
        };
    }
}
