<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_nilai_ahli extends Model
{
    protected $table = "t_nilai_ahli";
    protected $guarded = ['id'];

    public function guruMapel()
    {
        return $this->belongsToMany('App\t_guru_mapel_ahli', 't_nilai_ahli', 'id', 'id_guru');

    }
    public function siswa()
    {
        return $this->belongsToMany('App\m_siswa', 't_nilai_ahli', 'id', 'id_siswa');

    }
}
