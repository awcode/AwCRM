<?php
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'firstname'     => 'Mark',
        'lastname' => 'Walker',
        'email'    => 'm@awcode.com',
        'password' => Hash::make('test'),
    ));
}

}
