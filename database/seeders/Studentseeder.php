<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Studentseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
//we can use two methods to seed the data 1 databaseseeder creating instance and run db:seed the other one is $ php artisan db:seed --class=Studentseeder this will put only one row data
        DB::table("students")->insert([
            "name" => $faker->name(),
            "email" => $faker->safeEmail,
            "phone_no" => $faker->phoneNumber,
            "age" => $faker->numberBetween(25, 50),
            "gender" => $faker->randomElement(["male", "female", "others"]),
        ]);
    }
}
