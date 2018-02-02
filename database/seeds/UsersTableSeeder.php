<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'Admin', 'username' => 'admin', 'password' => bcrypt('123456'),'hak' => 'admin']);
        User::create(['name' => 'User 1', 'username' => 'user1', 'password' => bcrypt('123456'),'hak' => 'normal']);
    }
}
