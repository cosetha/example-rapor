<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('tahun')->insert([
            'status'=> 'Y',
            'tahun'=>'20182',
            'nama_kepsek'=> 'Agus Supriyadi',
            'nip_kepsek' =>'237918145',
            'tanggal_rapor' => Carbon::parse('2022-02-08')
        ]);

        DB::table('tahun')->insert([
            'status'=> 'n',
            'tahun'=>'20181',
            'nama_kepsek'=> 'Agus Supriyadi',
            'nip_kepsek' =>'237918145',
            'tanggal_rapor' => Carbon::parse('2021-08-08')
        ]);

        
    }
}
