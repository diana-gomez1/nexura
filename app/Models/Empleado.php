<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    
   
    protected $fillable = ['nombre', 'email', 'sexo', 'area_id', 'boletin', 'descripcion'];

    // Un empleado pertenece a un área
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    
    // Un empleado puede tener varios roles
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'empleado_rol', 'empleado_id', 'rol_id');
    }
}