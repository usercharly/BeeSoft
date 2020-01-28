<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $fillable =[
        'id','idespecie','nombre','imagen','telefono','lugar','descripcion','condicion'
    ];
}
