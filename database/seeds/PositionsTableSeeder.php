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

            if ($i == 0) {
                $salary = 500000;
            } elseif ($i > 1 && $i <= 20) {
                $salary = rand(400000,495000);
            } elseif ($i > 21 && $i <= 50) {
                $salary = rand(300000,395000);
            } elseif ($i > 51 && $i <= 70) {
                $salary = rand(200000,295000);
            } elseif ($i > 71 && $i <= 80) {
                $salary = rand(100000,195000);
            } else {
                $salary = rand(50000,95000);
            }

            Position::firstOrCreate([
                'name_position' => $faker->jobTitle,
                'default_salary' => $salary,
                'admin_created_id' => '1',
                'admin_updated_id' => '1',
            ]);
        }
    }
}
