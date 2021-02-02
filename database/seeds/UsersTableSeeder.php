<?php

use Illuminate\Database\Seeder;
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
        DB::table('users')->insert([
        	'role_id'  => '1',
        	'name'     => 'Md.Admin',
        	'userType' => 'admin',
        	'email'    => 'admin@gmail.com',
        	'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
        	'role_id'  => '2',
        	'name'     => 'Md.Student',
        	'userType' => 'student',
        	'email'    => 'student@gmail.com',
        	'password' => bcrypt('123456'),
        ]);
    }
}
