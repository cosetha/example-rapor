<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_nilai extends Model
{
    protected $table = "t_nilai_umum";
    protected $guarded = ['id'];

    public function guruMapel()
    {
        return $this->belongsToMany('App\t_guru_mapel', 't_nilai_umum', 'id', 'id_guru');

    }
    public function siswa()
    {
        return $this->belongsToMany('App\m_siswa', 't_nilai_umum', 'id', 'id_siswa');

    }
}
