<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TahunSeeder::class);
        // $this->call(MJurusanSeeder::class);
        // $this->call(TKeahlianSeeder::class);
        // $this->call(MGuruSeeder::class);
        // $this->call(MKelasSeeder::class);
        // $this->call(MMapelSeeder::class);
    }
}
