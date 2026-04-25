<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieRecommendation extends Model
{
    protected $fillable =[
        'estado_animo',
        'genero',
        'plataforma'
    ];
}
