<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_kelas extends Model
{
    protected $table = "t_kelas_siswa";
    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsToMany('App\m_kelas', 't_kelas_siswa', 'id', 'id_kelas');

    }
    public function guru()
    {
        return $this->belongsToMany('App\m_siswa', 't_kelas_siswa', 'id', 'id_siswa');

    }
}
