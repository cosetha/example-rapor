<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_mapel_ahli extends Model
{
    protected $table = "m_mapel_ahli";
    protected $guarded = ['id'];

    public function komKeahlian()
    {
        return $this->hasMany('App\t_keahlian', 'id', 'id_bidang');
    }
}
