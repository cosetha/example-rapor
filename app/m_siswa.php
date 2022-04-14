<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_siswa extends Model
{
    protected $table = "m_siswa";
    protected $guarded = ['id'];

    public function komKeahlian()
    {
        return $this->hasMany('App\t_keahlian', 'id', 'id_bidang');
    }

    public function kelas()
    {
        return $this->belongsToMany('App\m_kelas', 't_kelas_siswa', 'id_siswa', 'id_kelas');
    }
}
