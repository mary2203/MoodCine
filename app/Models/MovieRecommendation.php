<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieRecommendation extends Model
{
    protected $fillable =[
        'user_id',
        'estado_animo',
        'genero',
        'plataforma',
        'respuesta_ia'
    ];

    protected $casts = [
        'respuesta_ia' => 'array',
    ];
}
