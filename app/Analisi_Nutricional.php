<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analisi_Nutricional extends Model
{
     protected $table = "analisis_nutricional";
    protected $primaryKey = 'analisis_id';
    public $timestamps = false;

    protected $fillable = [
        'codigo', 'nombre','energia','proteina','lipidos','carbohidratos'
    ];

    protected $hidden = [
        'analisis_id',
    ];
}
