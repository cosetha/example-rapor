<?php

use Illuminate\Database\Seeder;

class MGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('m_guru')->insert([
            [
                'nama' => 'AGUS',
            ],
            [
                'nama' => 'UDIN',
            ],
            [
                'nama' => 'AMY',
            ]
        ]);
    }
}
