<ul class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
    @foreach ($vacantes as $vacante)
        <li class="p-10 border border-gray-300 bg-white shadow">
            <h2 class="text-2xl font-bold text-gray-900">{{$vacante->titulo}}</h2>

            <p class="block text-gray-700 font-normal my-2">{{$vacante->categoria->name}}</p>

            <p class="block text-gray-700 font-normal my-2">Ubicación:
                <span class="font-bold">{{$vacante->ubicacion->name}}</span>
            </p>

            <p class="block text-gray-700 font-normal my-2">Exeperiencia:
                <span class="font-bold">{{$vacante->experiencia->name}}</span>
            </p>

            <a href=" {{route('vacantes.show', $vacante)}} " class="bg-teal-500 text-gray-100 mt-2 px-4 py-2 inline-block rounded font-bold text-sm">Ver Vacante</a>

        </li>
    @endforeach
</ul>
