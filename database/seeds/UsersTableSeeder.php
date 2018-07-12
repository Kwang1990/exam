<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = new Faker;
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'avatar' => $faker->imageUrl(),
            'level' => rand(0,1),
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'date_of_birth' => $faker->date('Y-m-d'),
        ]);
    }
}
