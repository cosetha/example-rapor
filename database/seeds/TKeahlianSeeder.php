<?php

use Illuminate\Database\Seeder;

class TKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_keahlian')->insert([
            'nama_bidang'=>'Teknik Mesin',
            'id_bidang'=> '1'
        ]);
        DB::table('t_keahlian')->insert([
            'nama_bidang'=>'Teknik Industri',
            'id_bidang'=> '1'
        ]);
        DB::table('t_keahlian')->insert([
            'nama_bidang'=>'Teknik Perminyakan',
            'id_bidang'=> '2'
        ]);
        DB::table('t_keahlian')->insert([
            'nama_bidang'=>'Geologi Pertambangan',
            'id_bidang'=> '2'
        ]);
        DB::table('t_keahlian')->insert([
            'nama_bidang'=>'Teknik Komputer',
            'id_bidang'=> '3'
        ]);
        DB::table('t_keahlian')->insert([
            'nama_bidang'=>'Teknik Telekomunikasi',
            'id_bidang'=> '3'
        ]);
        DB::table('t_keahlian')->insert([
            'nama_bidang'=>' Keperawatan',
            'id_bidang'=> '4'
        ]);
        DB::table('t_keahlian')->insert([
            'nama_bidang'=>' Kesehatan Gigi',
            'id_bidang'=> '4'
        ]);
        DB::table('t_keahlian')->insert([
            'nama_bidang'=>'Farmasi',
            'id_bidang'=> '4'
        ]);
        DB::table('t_keahlian')->insert([
            'nama_bidang'=>'Agribisnis Ternak',
            'id_bidang'=> '5'
        ]);
        DB::table('t_keahlian')->insert([
            'nama_bidang'=>'Kesehatan Hewan,',
            'id_bidang'=> '5'
        ]);
    }
}
