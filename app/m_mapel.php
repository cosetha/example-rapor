<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_mapel extends Model
{
    protected $table = "m_mapel";
    protected $guarded = ['id'];

    public function gurumapel()
    {
        return $this->hasMany('App\t_guru_mapel', 'm_mapel_id', 'id');

    }
    
}
