<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 8; $i++)
        {
            \App\Models\Movie::create([
                'name' => $faker->word,
                'length_of_display' => $faker->randomNumber(),
                'details' => $faker->sentence,
				'img' => "https://static.digitecgalaxus.ch/Files/1/4/5/0/2/6/5/1/8717418532055xxl.jpg?fit=inside%7C708:354&output-format=progressive-jpeg",
            ]);
        }
    }
}
