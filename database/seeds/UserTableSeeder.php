<?php

use Illuminate\Database\Seeder;
use Nevera\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('users')->truncate();

        factory(User::class)->create([
          'name' => 'Admin',
          'role' => 'admin',
          'email' => 'admin@chumy.net',
          'password' => 'admin'
        ]);

        factory(User::class)->create([
          'name' => 'Chumy',
          'role' => 'user',
          'email' => 'chumy@chumy.net',
          'password' => 'chumy'
        ]);
        factory(User::class)->times(10)->create();

    }
}
