<?php

use Illuminate\Database\Seeder;

class MSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_siswa')->insert([
            [
                'nama' => "MAT",
            ],
            [
                'nama' => "BING",
            ],
            [
                'nama' => "DOR",
            ]
        ]);  
    }
}
