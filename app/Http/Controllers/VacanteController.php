<?php

namespace App\Http\Controllers;

use App\Salario;
use App\Vacante;
use App\Categoria;
use App\Ubicacion;
use App\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $data = $request->validate([
            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
            'descripcion' => 'required|min:50',
            'imagen' => 'required',
            'skills' => 'required'
        ]);

        

        return 'jj';
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

    public function imagen(Request $request)
    {
        $imagen = $request->file('file');
        $nombreImagen = time() . ''. $imagen->extension();
        $imagen->move(public_path('storage/vacantes'), $nombreImagen);
        return response()->json(['correcto' => $nombreImagen]);
    }

    public function borrarimagen(Request $request)
    {
        if($request->ajax()) {
            $imagen = $request->get('imagen');

            if( File::exists( 'storage/vacantes/'. $imagen ) ) {
                File::delete('storage/vacantes/'. $imagen );
            }

            return response('Imagen eliminada', 200);
        }
    }
}
