<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'usuario',
        'email',
        'primerNombre',
        'segundoNombre',
        'primerApellido',
        'segundoApellido',
        'idDepartamento',
        'idCargo'
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamentos::class, 'idDepartamento');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargos::class, 'idCargo');
    }

    public $timestamps = false;
}
