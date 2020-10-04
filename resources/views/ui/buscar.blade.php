<h2 class="my-10 text-2xl text-gray-700">Busca una vacante</h2>

<form action=" {{route('vacantes.buscar')}}" method="POST">
    @csrf
    <div class="mb-5">
        <label for="categoria" class="block text-gray-700 text-sm mb-2">Categoria</label>
        <select
            class="block appearance-none w-full border-gray-200 text-gray-700 rounded leading-light focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 @error('categoria') is-invalid @enderror"
            name="categoria"
            id="categoria"
        >
        <option value="">--Selecciones--</option>
            @foreach ($categorias as $categoria )
                <option
                    value="{{ $categoria->id }}"
                    {{old('categoria') == $categoria->id ? 'selected' : '' }}
                >{{$categoria->name}}</option>
            @endforeach
        </select>
        @error('categoria')
            <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6">
                <strong class="font-bold">Error!</strong>
                <span class="block">{{ $message}}</span>
            </div>
        @enderror
    </div>

    <div class="mb-5">
        <label for="ubicacion" class="block text-gray-700 text-sm mb-2">Ubicación:</label>

        <select
            id="ubicacion"
            class="block appearance-none w-full border-gray-200 text-gray-700 rounded leading-light focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
            name="ubicacion"
        >
            <option value="">--Selecciona--</option>
            @foreach ($ubicaciones as $ubicacion)
                <option
                    value="{{$ubicacion->id}}"
                    {{old('ubicacion') == $ubicacion->id ? 'selected' : ''}}
                >{{$ubicacion->name}}</option>
            @endforeach
        </select>

        @error('ubicacion')
        <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{ $message}}</span>
        </div>
       @enderror
    </div>

    <button
        type="submit"
        class="bg-teal-500 w-full hover:bg-teal-600 text-gray-100 font-bold p-3 focus:outline-none focus:shadow-outline uppercase mt-10"
    >Buscar Vacantes</button>
</form>