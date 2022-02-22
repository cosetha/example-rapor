<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_kelas extends Model
{
    protected $table = "m_kelas";
    protected $guarded = ['id'];


    public function relation()
    {
        return $this->hasMany('App\Relation', 'm_kelas_id', 'id');

    }

    public function keahlian()
    {
        return $this->hasMany('App\t_keahlian', 'id', 'id_keahlian');
    }
    
}
