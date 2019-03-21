<?php

namespace Modules\Membercv\Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MembercvDatabaseSeeder extends Seeder
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
                'location' => $faker->locale,
                'job' => $faker->jobTitle,
                'jobDetail' => $faker->jobTitle,
                'description' => $faker->text,
                'position' => $faker->title,
                'workingTime' => '8 hours',
                'created_at' => date('Y-m-d H:m:s', strtotime("-1 days", time())),
                'updated_at' => date('Y-m-d H:m:s', strtotime("1 days", time())),
            ];
            $arrayFakeData[] = $data;
        }
        DB::table('membercv__membercvs')->insert($arrayFakeData);
    }
}
