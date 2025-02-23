<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'dui', 'email', 'saldo_acumulado'];

    // Relación con Arqueo
    public function arqueos()
    {
        return $this->hasMany(Arqueo::class);
    }
    public function pagos()
{
    return $this->hasMany(Pago::class);
}

}
