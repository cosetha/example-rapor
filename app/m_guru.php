<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_guru extends Model
{
    protected $table = "m_guru";
    protected $guarded = ['id'];
    
    public function gurumapel()
    {
        return $this->hasMany('App\t_guru_mapel', 'm_guru_id', 'id');

    }

    public function guru()
    {
      return $this->hasOne('App\User', 'id', 'id_user');
    }
    
    public function walikelas()
    {
        return $this->belongsToMany('App\m_kelas', 't_walikelas', 'id_guru', 'id_kelas');
    }

}
