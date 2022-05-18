<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_nilai_extra extends Model
{
    protected $table = "t_nilai_extra";
    protected $guarded = ['id'];

    public function ekstrakurikuler()
    {
        return $this->belongsToMany('App\m_extra', 't_nilai_extra', 'id', 'id_extra');

    }
}
