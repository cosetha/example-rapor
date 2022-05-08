<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_guru_mapel extends Model
{
    protected $table = "t_guru_mapel";
    protected $guarded = ['id'];
    
    public function kelas()
    {
        return $this->belongsToMany('App\m_kelas', 't_guru_mapel', 'id', 'm_kelas_id');

    }
    public function guru()
    {
        return $this->belongsToMany('App\m_guru', 't_guru_mapel', 'id', 'm_guru_id');

    }
    public function mapel()
    {
        return $this->belongsToMany('App\m_mapel', 't_guru_mapel', 'id', 'm_mapel_id');

    }
}
