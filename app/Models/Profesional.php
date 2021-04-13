<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    protected $fillable= ['nroDocumento','nombre','apellidos','habilidades','salario','disponible'];
    use HasFactory;
}
