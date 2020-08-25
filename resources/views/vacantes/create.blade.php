@extends('layouts.app')

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Nueva Vacante</h1>

    <form action="" method="POST" class="max-w-lg mx-auto my-10">
        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo Vacante:</label>

            <input type="text" id="titulo" name="titulo" class="p-3 bg-gray-100 rounded form-input w-full">            
        </div>

        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">Categoria:</label>

            <select
                id="categoria"
                class="block appearance-none w-full border-gray-200 text-gray-700 rounded leading-light focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
                name="categoria"
            >
                <option disable selected>--Selecciona--</option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">Experiencias:</label>

            <select
                id="experiencia"
                class="block appearance-none w-full border-gray-200 text-gray-700 rounded leading-light focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
                name="experiencia"
            >
                <option disable selected>--Selecciona--</option>
                @foreach ($experiencias as $experiencia)
                    <option value="{{$experiencia->id}}">{{$experiencia->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="ubicacion" class="block text-gray-700 text-sm mb-2">Ubicación:</label>

            <select
                id="ubicacion"
                class="block appearance-none w-full border-gray-200 text-gray-700 rounded leading-light focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
                name="ubicacion"
            >
                <option disable selected>--Selecciona--</option>
                @foreach ($ubicaciones as $ubicacion)
                    <option value="{{$ubicacion->id}}">{{$ubicacion->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="salario" class="block text-gray-700 text-sm mb-2">Salario:</label>

            <select
                id="salario"
                class="block appearance-none w-full border-gray-200 text-gray-700 rounded leading-light focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
                name="salario"
            >
                <option disable selected>--Selecciona--</option>
                @foreach ($salarios as $salario)
                    <option value="{{$salario->id}}">{{$salario->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-teal-500 w-full hover:bg-teal-600 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold">Publicar Vacante</button>
    </form>
@endsection