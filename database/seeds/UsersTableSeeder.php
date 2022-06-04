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
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Guru',
            'username'=> 'guru',
            'level' => 'Guru',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Guru1',
            'username'=> 'guru1',
            'level' => 'Guru',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Guru2',
            'username'=> 'guru2',
            'level' => 'Guru',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Wali',
            'username'=> 'wali',
            'level' => 'Wali',
            'password' => bcrypt('password'),
        ]);
    }
}
