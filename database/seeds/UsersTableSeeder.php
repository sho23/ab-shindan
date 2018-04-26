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
            'name' => 'Sho',
            'email' => env('APP_USER_EMAIL'),
            'password' => bcrypt(env('APP_USER_PASS')),
        ]);
    }
}
