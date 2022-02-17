<?php

use Illuminate\Database\Seeder;

class MKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_kelas')->insert([
            [
                'nama' => Str::random(10),
            ],
            [
                'nama' => Str::random(10),
            ],
            [
                'nama' => Str::random(10),
            ]
        ]);
    }
}
