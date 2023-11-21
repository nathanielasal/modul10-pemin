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

    protected $fillable = [
        'nim',
        'nama',
        'angkatan',
        'prodiId',
        'password',
    ];

    protected $hidden = [];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodiId');
    }
}
