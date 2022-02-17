<?php

use Illuminate\Database\Seeder;

class MMapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_mapel')->insert([
            [
                'nama' => "Matematika",
            ],
            [
                'nama' => "Olah Raga",
            ],
            [
                'nama' => "Teknik Mesin",
            ]
        ]);  
    }
}
