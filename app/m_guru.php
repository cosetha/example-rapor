<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_guru extends Model
{
    protected $table = "m_guru";
    protected $guarded = ['id'];
    
    public function relation()
    {
        return $this->hasMany('App\Relation', 'm_guru_id', 'id');

    }

    public function guru()
    {
      return $this->hasOne('App\User', 'id', 'id_user');
    }
    
}
