<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    protected $table = 'consultorios';

    protected $fillable = [
        'numero',
        'ubicacion',
        'activo'
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}