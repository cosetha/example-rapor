<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_wali_murid extends Model
{
    protected $table = "m_wali_murid";

    public function wali()
    {
      return $this->hasOne('App\User', 'id', 'id_user');
    }
    
    public function siswa()
    {
      return $this->hasOne('App\m_siswa', 'id', 'id_siswa');
    }
}
