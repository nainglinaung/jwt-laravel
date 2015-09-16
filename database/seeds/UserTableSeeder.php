<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->truncate();

      $faker = Faker\Factory::create();

      for ($i=0; $i < 10 ; $i++) {

        $fakeData =  [
            'name'     => $faker->name,
            'password' => Hash::make('secret'),
            'email'    => $faker->email
        ];

        User::create($fakeData);
      }

    }
}
