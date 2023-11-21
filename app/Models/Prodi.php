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

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama'
    ];

    protected $hidden = [];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'prodiId');
    }

}
