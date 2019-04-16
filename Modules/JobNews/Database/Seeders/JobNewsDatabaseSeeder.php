<?php

namespace Modules\JobNews\Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class JobNewsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $limit = 30;
        $arrayFakeData = [];
        for ($i = 0; $i < $limit; $i++) {
            $data = [
                'title' => $faker->text,
                'salary' => rand(1000,10000),
                'user_id' => rand(1,10),
                'description' => $faker->text,
                'startTime' => date('Y-m-d H:m:s', strtotime("-1 days", time())),
                'endTime' => date('Y-m-d H:m:s', strtotime("0 days", time())),
                'created_at' => date('Y-m-d H:m:s', strtotime("-1 days", time())),
                'updated_at' => date('Y-m-d H:m:s', strtotime("1 days", time())),
            ];
            $arrayFakeData[] = $data;
        }
        DB::table('jobNews')->insert($arrayFakeData);
    }
}
