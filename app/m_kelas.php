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

    /**
     * The roles that belong to the m_kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function siswa()
    {
        return $this->belongsToMany('App\m_siswa', 't_kelas_siswa', 'id_kelas', 'id_siswa');
    }
    
    public function walikelas()
    {
        return $this->belongsToMany('App\m_guru', 't_walikelas', 'id_kelas', 'id_guru');
    }
}
