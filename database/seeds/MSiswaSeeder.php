<?php

use Illuminate\Database\Seeder;
use App\m_siswa;
class MSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        m_siswa::factory()->count(10)->create();
    }
}
