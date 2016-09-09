<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 5; $i++)
            DB::table('categories')->insert([
                'name' => $faker->company,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
    }
}
