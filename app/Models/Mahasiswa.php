<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [ // dikerjakan oleh Shafa Nathaniela Salwa
        'nim',
        'nama',
        'angkatan',
        'prodiId',
        'password',
    ];

    protected $hidden = [];

    public function prodi() // dikerjakan oleh Shafa Nathaniela Salwa
    {
        return $this->belongsTo(Prodi::class, 'prodiId');
    }
}
