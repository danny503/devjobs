<?php

namespace App\Http\Controllers;

use App\Vacante;
use App\Categoria;
use App\Experiencia;
use App\Salario;
use App\Ubicacion;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        return view('vacantes.index');
    }

    public function create()
    {
        //Consultas
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();
        return view('vacantes.create', compact('categorias', 'experiencias', 'ubicaciones', 'salarios'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Vacante $vacante)
    {
        //
    }

    public function edit(Vacante $vacante)
    {
        //
    }

    public function update(Request $request, Vacante $vacante)
    {
        //
    }


    public function destroy(Vacante $vacante)
    {
        //
    }
}
