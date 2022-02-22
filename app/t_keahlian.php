<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_keahlian extends Model
{
    protected $table = "t_keahlian";
    protected $guarded = ['id'];

    public function bidangStudi()
    {
        return $this->hasMany('App\m_jurusan', 'id', 'id_bidang');
    }
}
