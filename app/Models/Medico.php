<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'medicos';

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'telefono',
        'correo',
        'especialidad_id',
        'consultorio_id',
        'activo'
    ];

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class);
    }

    // <-- ESTA ES LA FUNCIÓN QUE FALTABA EN EL MODELO
    public function consultorio()
    {
        return $this->belongsTo(Consultorio::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}