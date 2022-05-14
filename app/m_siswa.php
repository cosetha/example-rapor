<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class m_siswa extends Model
{
   
    protected $table = "m_siswa";
    protected $guarded = ['id'];
   

    public function komKeahlian()
    {
        return $this->hasMany('App\t_keahlian', 'id', 'id_bidang');
    }

    public function absensi()
    {
        return $this->hasMany('App\t_nilai_absensi', 'id_siswa', 'id');
    }

    public function kelas()
    {
        return $this->belongsToMany('App\m_kelas', 't_kelas_siswa', 'id_siswa', 'id_kelas');
    }
}
