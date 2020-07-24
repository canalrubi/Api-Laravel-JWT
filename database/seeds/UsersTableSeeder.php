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
        $users = array(
            ['name' => 'Test', 'email'=>'test@test.com', 'password'=>bcrypt('mmmmmm')]
        );
        foreach($users as $user){
            User::create($user);
        }
    }
}
