<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => str_random(10),
          'email' => 'ice@ice.com',
          'password' => '$2y$10$zvlF7EZRBeM7jI84VzRR6uJbjPi1sGAlj.aPrOm/60GkT1fRvtHHu',
          'is_boss' => '1'
      ]);
      DB::table('users')->insert([
          'name' => str_random(10),
          'email' => 'earth@earth.com',
          'password' => '$2y$10$zvlF7EZRBeM7jI84VzRR6uJbjPi1sGAlj.aPrOm/60GkT1fRvtHHu',
          'is_boss' => '0'
      ]);
    }
}
