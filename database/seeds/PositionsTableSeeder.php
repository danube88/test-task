<?php

use Illuminate\Database\Seeder;
use App\Position;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create('ru_RU');
        for ($i = 0; $i < 100; $i++) {
          Position::firstOrCreate([
              'name_position' => $faker->jobTitle,
              'default_salary' => $faker->numberBetween(0,500000),
              'admin_created_id' => '1',
              'admin_updated_id' => '1',
          ]);
        }
    }
}
