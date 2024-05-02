<?php

namespace Database\Seeders;

use App\Models\movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i < 8; $i++)
        {
            movie::create([
                'id'=>$i,
                'name'=> $faker->name,
                'actor'=>$faker->name,
                'director'=>$faker->name,
            ]);
        }
    }
}
