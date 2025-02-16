<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arqueo extends Model
{
    use HasFactory;

    protected $fillable = ['denominacion', 'tipo', 'cantidad', 'total', 'empleado_id'];

    // Relación con Empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}

