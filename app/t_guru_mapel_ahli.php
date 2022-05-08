<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_guru_mapel_ahli extends Model
{
    protected $table = "t_guru_mapel_ahli";
    protected $guarded = ['id'];
    
    public function kelas()
    {
        return $this->belongsToMany('App\m_kelas', 't_guru_mapel_ahli', 'id', 'm_kelas_id');

    }
    public function guru()
    {
        return $this->belongsToMany('App\m_guru', 't_guru_mapel_ahli', 'id', 'm_guru_id');

    }
    public function mapel()
    {
        return $this->belongsToMany('App\m_mapel_ahli', 't_guru_mapel_ahli', 'id', 'm_mapel_id');

    }
}
