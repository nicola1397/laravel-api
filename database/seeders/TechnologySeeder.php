<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Faker\Generator as Faker;


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $technology_names = ['HTML', 'CSS', 'BOOTSRTAP', 'SASS', 'JAVASCRIPT', 'VUEJS', 'LARAVEL', 'PHP', 'BLADE'];


        foreach ($technology_names as $techname) {
            $technology = new Technology;
            $technology->label = $techname;
            $technology->color = $faker->hexColor();
            $technology->save();
        }
    }
}
