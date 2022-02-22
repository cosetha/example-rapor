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
            'name' => 'Admin',
            'username'=> 'admin',
            'level'=>'Admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Guru',
            'username'=> 'guru',
            'level' => 'Guru',
            'email' => 'guru@email.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Guru1',
            'username'=> 'guru1',
            'level' => 'Guru',
            'email' => 'guru1@email.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Guru2',
            'username'=> 'guru2',
            'level' => 'Guru',
            'email' => 'guru2@email.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Wali',
            'username'=> 'wali',
            'level' => 'Wali',
            'email' => 'wali@email.com',
            'password' => bcrypt('password'),
        ]);
    }
}
