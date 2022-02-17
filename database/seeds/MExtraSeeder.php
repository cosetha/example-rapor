<?php

use Illuminate\Database\Seeder;

class MExtraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_extra')->insert([
            [
                'nama' => "PRAMUKA",
            ],
            [
                'nama' => "OLIMPIADE",
            ],
            [
                'nama' => "SEPAK BOLA",
            ]
        ]);  
    }
}
