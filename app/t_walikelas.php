<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_walikelas extends Model
{
    protected $table = "t_walikelas";
    protected $guarded = ['id'];

    public function guru()
    {
        return $this->belongsToMany('App\m_guru', 't_walikelas', 'id', 'id_guru');
    }
    public function kelas()
    {
        return $this->belongsToMany('App\m_kelas', 't_walikelas', 'id', 'id_kelas');
    }
}
