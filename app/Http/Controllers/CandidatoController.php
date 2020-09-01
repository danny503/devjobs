<?php

namespace App\Http\Controllers;

use App\Candidato;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //validacion
        $data = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf|max:10000',
            'vacante_id' => 'required'
        ]);

        //Almacenar archivo pdf
        if($request->file('cv'))
        {
            $archivo = $request->file('cv');
            $nombreArchivo = time() . "." . $request->file('cv')->extension();
            $ubicacion = public_path('/storage/cv');
            $archivo->move($ubicacion, $nombreArchivo);
        }

        $candidato = new Candidato();
        $candidato->nombre = $data['nombre'];
        $candidato->email = $data['email'];
        $candidato->cv = $nombreArchivo;
        $candidato->vacante_id = $data['vacante_id'];
        $candidato->save();

        //Otra forma de guardar en la DB
        // $candidato = new Candidato($data);
        // $candidato->cv = "123.pdf";

        //Otra forma de guardar en la DB
        // $candidato = new Candidato();
        //$candidato->fill($data);
        // $candidato->cv = "123.pdf";

        return back()->with('estado', 'Tus datos se enviaron correctamente, suerte!!');
    }

    public function show(Candidato $candidato)
    {
        //
    }

    public function edit(Candidato $candidato)
    {
        //
    }


    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    public function destroy(Candidato $candidato)
    {
        //
    }
}