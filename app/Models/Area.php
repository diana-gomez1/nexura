<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    // Un area puede tener varios empleados
    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
}