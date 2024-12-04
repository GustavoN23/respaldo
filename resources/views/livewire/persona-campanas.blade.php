<div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
        @forelse ($campanas as $campana)
        <div class="p-4 bg-white rounded-md shadow-2xl shadow-gray-500/20 motion-safe:hover:scale-[1.01] 
        transition-all duration-250 w-full mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="md:h-64 md:w-64 h-full w-full shadow-sm">
                    <a href="{{ route('personas.show', $campana->titulo) }}">
                        <img src="{{ asset('storage/campaigns/' . $campana->imagen) }}" alt="{{'Imagen Camapaña' . $campana->titulo}}" 
                        class="rounded-md h-full">
                    </a>
                </div>
                <div class="flex flex-col justify-center items-center md:justify-start md:items-start">
                    <a href="{{ route('personas.show', $campana->titulo) }}" class="text-xl font-semibold text-gray-900 text-center md:text-left bg-green-50
                    hover:bg-green-100 rounded-md py-1 px-3 shadow-sm">
                        {{ $campana->titulo }}
                    </a>
                    <p class="text-gray-500 mt-1 text-center md:text-left">
                        {{ $campana->descripcion }} 
                    </p>
                    <div class="mt-1 flex flex-col justify-center items-center md:justify-start md:items-start">
                        <p class="font-bold">{{ $campana->municipio }}, {{ $campana->departamento }}</p>
                        <p class="text-gray-500">Dirección: 
                            <span class="text-black">{{ $campana->direccion }}</span>
                        </p>
                        <p class="text-gray-500">Genero: 
                            <span class="uppercase text-black">{{ $campana->vacuna->genero }}</span>
                        </p>
                        <div class="flex gap-6">
                            <p class="text-gray-500">Desde: 
                                <span class="font-bold text-black">{{ $campana->vacuna->edad_desde }} </span>
                            </p>
                            <p class="text-gray-500">Hasta: 
                                <span class="font-bold text-black">{{ $campana->vacuna->edad_hasta }} </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="border-b border-gray-300 mt-6 mb-6"></div>
        
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 items-center justify-center">
                <div class="col-span-3 flex flex-col items-center justify-center md:flex-row gap-2 md:gap-6 border-r border-gray-300">
                    <p class="font-bold text-xl">{{ $campana->fecha->toFormattedDateString() }}<p>
                    <p class="uppercase text-gray-600 underline"> {{ $campana->vacuna->tipo }} </p>
                    <p class="font-bold text-green-800 text-xl">${{ number_format($campana->vacuna->precio, 0, '.', ',') }}</p>
                </div>
                <div class="md:col-span-2">
                    <a href="{{ route('personas.show', $campana->titulo) }}" class="flex justify-center items-center bg-green-600 hover:bg-green-700 text-white 
                    rounded-md py-2 font-extrabold">
                        Ver campaña
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 ml-1">
                            <path fill-rule="evenodd" d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6Zm-5.03 4.72a.75.75 0 0 0 0 1.06l1.72 1.72H2.25a.75.75 0 0 0 0 1.5h10.94l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 0 0-1.06 0Z" clip-rule="evenodd" />
                        </svg>                          
                    </a>
                </div>
            </div>
        </div>
        @empty
            <p class="mt-5 text-center text-sm text-gray-800 uppercase col-span-2">No hay campañas aún</p>
        @endforelse
    </div>
{{--PAGINACION--}}
    <div class="mt-10 col-span-2">
        {{ $campanas->links() }}
    </div>
</div>