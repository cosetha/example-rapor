<?php

use Illuminate\Database\Seeder;

class MJurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_bidang_studi')->insert([
            'nama_bidang'=>'Teknologi dan Rekayasa'
        ]);
        DB::table('m_bidang_studi')->insert([
            'nama_bidang'=>'Energi dan Pertambangan'
        ]);
        DB::table('m_bidang_studi')->insert([
            'nama_bidang'=>'Teknologi Informasi dan Komunikasi'
        ]);
        DB::table('m_bidang_studi')->insert([
            'nama_bidang'=>' Kesehatan dan Pekerjaan Sosial'
        ]);
        DB::table('m_bidang_studi')->insert([
            'nama_bidang'=>'Agribisnis dan Agroteknologi'
        ]);
    }
}
