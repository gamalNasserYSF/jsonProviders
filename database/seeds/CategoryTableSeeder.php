<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            ['name' => 'Thriller'],
            ['name' => 'Action'],
            ['name' => 'Comedy'],
            ['name' => 'Scifi'],
            ['name' => 'Horror'],
        ];

        DB::table('categories')->insert($names);
    }
}
