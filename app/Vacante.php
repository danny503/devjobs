<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    protected $fillable = ['descipcion', 'categoria_id', 'ubicacion_id', 'expercia_id', 'salario_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
