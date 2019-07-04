<?php

use Illuminate\Database\Seeder;
use App\Subordination;

class SubordinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 1; $i < 50000; $i++) {
            if($i < 31){
                $head = 1;
            }
            if($i > 30 && $i <= 500){
                $head = rand(2,30);
            }
            if($i > 500 && $i <= 10000){
                $head = rand(31,500);
            }
            if($i > 10000 && $i <= 25000){
                $head = rand(501,10000);
            }
            if($i > 25000 && $i < 50000){
                $head = rand(10001,25000);
            }
            $sub = $i+1;
            Subordination::firstOrCreate([
                'head_id' => $head,
                'inferior_id' => $sub,
                'admin_created_id' => '1',
                'admin_updated_id' => '1',
            ]);
        }
    }
}
