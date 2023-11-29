<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = [ //-- dikerjakan oleh Ranatika Putri Aulia
        'nama'
    ]; 

    protected $hidden = [];

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'prodiId');
    }


}
