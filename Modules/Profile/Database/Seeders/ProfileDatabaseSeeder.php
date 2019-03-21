<?php

namespace Modules\Profile\Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProfileDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //user
        DB::table('profile__frontendUsers')->truncate();
        $faker = Faker::create();
        $limit = 30;
        $arrayFakeData = [];
        for ($i = 0; $i < $limit; $i++) {
            $data = [
                'username' => $faker->userName,
                'password' => $faker->password,
                'role' => array_rand(['member','enterprise']),
                'created_at' => date('Y-m-d H:m:s', strtotime("-1 days", time())),
                'updated_at' => date('Y-m-d H:m:s', strtotime("1 days", time())),
            ];
            $arrayFakeData[] = $data;
        }
        DB::table('profile__frontendUsers')->insert($arrayFakeData);

        //user info
        DB::table('profile__frontendUserInfos')->truncate();
        $faker = Faker::create();
        $limit = 30;
        $arrayFakeData = [];
        for ($i = 0; $i < $limit; $i++) {
            $data = [
                'name' => $faker->name,
                'phoneNumber' => $faker->phoneNumber,
                'email' => $faker->email,
                'address' => $faker->address,
                'birthday' => $faker->dateTime,
                'jobDetail' => $faker->jobTitle,
                'educationLevel' => rand(1,4),
                'user_id' => $i,
                'description' => $faker->text,
                'created_at' => date('Y-m-d H:m:s', strtotime("-1 days", time())),
                'updated_at' => date('Y-m-d H:m:s', strtotime("1 days", time())),
            ];
            $arrayFakeData[] = $data;
        }
        DB::table('profile__frontendUserInfos')->insert($arrayFakeData);
    }
}
