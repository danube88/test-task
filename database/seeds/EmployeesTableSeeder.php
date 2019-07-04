<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ru_RU');
        $cod = ['0' => '50',
                '1' => '95',
                '2' => '99',
                '3' => '67',
                '4' => '66',
                '5' => '63',
                '6' => '68',
                '7' => '96',
                '8' => '97',
                '9' => '98',
                '10'=> '73',
                '11'=> '93'];

        for ($i = 0; $i < 50000; $i++) {

            if ($i == 0) {
                $position = 1;
            } elseif ($i > 0 && $i <= 30) {
                $position = rand(2,20);
            } elseif ($i > 31 && $i <= 500) {
                $position = rand(21,50);
            } elseif ($i > 501 && $i <= 10000) {
                $position = rand(51,70);
            } elseif ($i > 10001 && $i <= 25000) {
                $position = rand(71,80);
            } else {
                $position = rand(81,100);
            }

            Employee::firstOrCreate([
                'name' => $faker->name,
                'phone' => '+380'.$cod[array_rand($cod)].rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9),
                'email' => $faker->freeEmail(),
                'position_id' => $position,
                'salary' => $faker->randomNumber(6),
                'employment_date' => $faker->date($format = 'Y-m-d', $max = '2019-06-30'),
                'photo' => null,
                'admin_created_id' => '1',
                'admin_updated_id' => '1',
            ]);
        }
    }
}
