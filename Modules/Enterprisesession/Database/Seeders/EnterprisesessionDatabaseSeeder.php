<?php

namespace Modules\Enterprisesession\Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class EnterprisesessionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Enterprise_Sessions')->truncate();
        $faker = Faker::create();
        $limit = 30;
        $arrayFakeData = [];
        for ($i = 0; $i < $limit; $i++) {
            $data = [
                'user_id' => $i,
                'session_id' => $i,
                'status' => array_rand(['none','rejected','allow']),
                'jobNews_id' => $i,
                'created_at' => date('Y-m-d H:m:s', strtotime("-1 days", time())),
                'updated_at' => date('Y-m-d H:m:s', strtotime("1 days", time())),
            ];
            $arrayFakeData[] = $data;
        }
        DB::table('Enterprise_Sessions')->insert($arrayFakeData);
    }
}
