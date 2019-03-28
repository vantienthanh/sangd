<?php

namespace Modules\Session\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SessionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('session__sessions')->truncate();
        $faker = Faker::create();
        $limit = 30;
        $arrayFakeData = [];
        for ($i = 0; $i < $limit; $i++) {
            $data = [
                'title' => $faker->title,
                'location' => $faker->locale,
                'startTime' => date('Y-m-d H:m:s', strtotime("-1 days", time())),
                'endTime' => date('Y-m-d H:m:s', strtotime("0 days", time())),
                'created_at' => date('Y-m-d H:m:s', strtotime("-1 days", time())),
                'updated_at' => date('Y-m-d H:m:s', strtotime("1 days", time())),
            ];
            $arrayFakeData[] = $data;
        }
        DB::table('sessions')->insert($arrayFakeData);
        // $this->call("OthersTableSeeder");
    }
}
