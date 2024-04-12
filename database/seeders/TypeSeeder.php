<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run(Faker $faker)
    {
        $type_names = ['Front-end', 'Back-end', 'FullStack'];


        foreach ($type_names as $typename) {
            $type = new Type;
            $type->label = $typename;
            $type->color = $faker->hexColor();
            $type->save();
        }

    }
}
