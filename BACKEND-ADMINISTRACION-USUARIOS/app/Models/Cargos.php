<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cargos extends Model
{
    use HasFactory;

    protected $table = 'cargos';

    protected $fillable = [
        'codigo',
        'nombre',
        'activo',
        'idUsuarioCreacion'
    ];

    public function usuarios()
    {
        return $this->hasMany(Users::class, 'idCargo');
    }
}
