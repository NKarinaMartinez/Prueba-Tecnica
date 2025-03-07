<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    use HasFactory;

    protected $table = 'departamentos';

    protected $fillable = [
        'codigo',
        'nombre',
        'activo',
        'idUsuarioCreacion'
    ];

    public function usuarios()
    {
        return $this->hasMany(Users::class, 'idDepartamento');
    }
}
