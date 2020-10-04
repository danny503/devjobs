<?php

namespace App\Http\Controllers;

use App\Salario;
use App\Vacante;
use App\Categoria;
use App\Ubicacion;
use App\Experiencia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class VacanteController extends Controller
{

    public function index()
    {
        //$vacantes = auth()->user()->vacantes;

        $vacantes = Vacante::where('user_id', auth()->user()->id)->orderBy( 'created_at','desc')->simplePaginate(3);

        return view('vacantes.index', compact('vacantes'));
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

        //Almacenar en la DB
        $vacante = new Vacante();
        $vacante->titulo = $data['titulo'];
        $vacante->slug = Str::slug($data['titulo'], '-');
        $vacante->descripcion = $data['descripcion'];
        $vacante->categoria_id = $data['categoria'];
        $vacante->experiencia_id = $data['experiencia'];
        $vacante->ubicacion_id = $data['ubicacion'];
        $vacante->salario_id = $data['salario'];
        $vacante->skills = $data['skills'];
        $vacante->imagen = $data['imagen'];
        $vacante->user_id = \Auth::user()->id;
        $vacante->save();

        return redirect()->action('VacanteController@index');
    }

    public function show(Vacante $vacante)
    {
        if($vacante->activa === 0 ) return abort(404);
        return view('vacantes.show', compact('vacante'));
    }

    public function edit(Vacante $vacante)
    {
        $this->authorize('view', $vacante);

        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();
        return view('vacantes.edit', compact('vacante', 'categorias', 'experiencias', 'ubicaciones', 'salarios'));
    }

    public function update(Request $request, Vacante $vacante)
    {
        $this->authorize('update', $vacante);

        //dd($request->all);
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

        $vacante->titulo = $data['titulo'];
        $vacante->skills = $data['skills'];
        $vacante->imagen = $data['imagen'];
        $vacante->descripcion = $data['descripcion'];
        $vacante->categoria_id = $data['categoria'];
        $vacante->experiencia_id = $data['experiencia'];
        $vacante->ubicacion_id = $data['ubicacion'];
        $vacante->salario_id = $data['salario'];
        $vacante->save();

        return redirect()->action('VacanteController@index');

    }


    public function destroy(Vacante $vacante)
    {
        $this->authorize('delete', $vacante);
        //return response()->json($vacante);
        $vacante->delete();
        return response()->json(['mensaje' => 'Se eliminó la vacante' . $vacante->titulo]);
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

    //Cambia el esatdo de la vacante
    public function cambiarEstado(Request $request, Vacante $vacante)
    {
        //Leer nuevo estado y asignarlo
        $vacante->activa = $request->estado;
        //guardar en la Db
        $vacante->save();
        return response()->json(['respuesta' => 'Correcto']);
    }

    public function buscar(Request $request, Vacante $vacante)
    {
        //Validar
        $data = $request->validate([
            'categoria' => 'required',
            'ubicacion' => 'required'
        ]);

        //Asignar valore
        $categoria = $data['categoria'];
        $ubicacion = $data['ubicacion'];

        $vacantes = Vacante::latest()
        ->where('categoria_id', $categoria)
        ->where('ubicacion_id', $ubicacion)
        ->get();

        //Otra manera
        // $vacantes = Vacante::where([
        //     'categoria_id' => $categoria,
        //     'ubicacion_id' => $ubicacion
        // ])->get();
        return view('buscar.index', compact('vacantes'));
    }

    public function resultados()
    {
        return ;
    }
}
