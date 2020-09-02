<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    protected $fillable = ['titulo','imagen','descipcion', 'skills', 'categoria_id', 'ubicacion_id', 'expercia_id', 'salario_id', 'user_id'];

    //Relacion 1:1 categoria y vacante
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    //Relacion 1:1 salario y vacante
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }

    //Relacion 1:1 experiencia y vacante
    public function experiencia()
    {
        return $this->belongsTo(Experiencia::class);
    }

    //Relacion 1:1 ubicacion y vacante
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }

    //Relacion 1:1 user y vacante
    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }
}
