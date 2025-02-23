<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    // Campos que son asignables en masa
    protected $fillable = ['empleado_id', 'monto', 'descuento', 'prestamo', 'total_pagar'];

    // Relación con Empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}

