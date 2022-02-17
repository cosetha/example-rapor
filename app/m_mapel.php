<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_mapel extends Model
{
    protected $table = "m_mapel";
    protected $guarded = ['id'];

    public function relation()
    {
        return $this->hasMany('App\Relation', 'm_mapel_id', 'id');

    }
    
}
