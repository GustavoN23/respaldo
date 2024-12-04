<div class="md:flex">
     {{--
        Filtraremos para que si un usuario (persona) le da por cambiar el id en la url y ingresa uno de mascota, 
        no le muestre la campaña si no que le muestre un mensaje de que no se encontro la campaña
    --}}
    @if ($campana->vacuna->tipo_user === 'mascota')
        <!-- Left Side -->
        <div class="w-full md:w-4/12 md:mx-2 p-3 shadow-md rounded-md">
            <!-- Profile Card -->
            <div class="rounded-md">
                <img src="{{ asset('storage/campaigns/' . $campana->imagen) }}" alt="{{'Imagen Camapaña' . $campana->titulo}}" class="rounded-md">
            </div>
            <h1 class="text-orange-900 font-bold text-2xl mt-2 mb-1 text-center md:text-left">{{ $campana->titulo }}</h1>
            <h2 class="hover:text-orange-600 text-lg text-center md:text-left">Enfermedad que previene: 
                <span class="font-bold ">{{ $campana->vacuna->enfermedad }}</span>
            </h2>
            <p class="text-md text-gray-700 hover:text-gray-900">{{ $campana->descripcion }}</p>
        </div>
        <!-- End Left Side -->
        <!-- Right Side -->
        <div class="w-full md:w-8/12 md:mx-2 rounded-md mb-2">
            <div class="p-3 shadow-md rounded-md">
                <div class="grid md:grid-cols-2 text-md">
                    <div class="md:col-span-1">
                        <div class="grid grid-cols-2">
                            <p class="px-4 py-2 font-semibold text-orange-900">Nombre vacuna:</p>
                            <p class="px-2 py-2">{{ $campana->vacuna->nombre }}</p>
                        </div>
                        <div class="grid grid-cols-2">
                            <p class="px-4 py-2 font-semibold text-orange-900">Genero:</p>
                            <p class="px-2 py-2 uppercase">{{ $campana->vacuna->genero }}</p>
                        </div>
                        <div class="grid grid-cols-2">
                            <p class="px-4 py-2 font-semibold text-orange-900">Edad desde:</p>
                            <p class="px-2 py-2">{{ $campana->vacuna->edad_desde }}</p>
                        </div>
                        <div class="grid grid-cols-2">
                            <p class="px-4 py-2 font-semibold text-orange-900">Edad hasta:</p>
                            <p class="px-2 py-2">{{ $campana->vacuna->edad_hasta }}</p>
                        </div>
                        <div class="grid grid-cols-2">
                            <p class="px-4 py-2 font-semibold text-orange-900">Hora desde:</p>
                            <p class="px-2 py-2">{{ $hora_desde->format('h:i') }} a.m</p>
                        </div>
                    </div>
                    <div class="md:col-span-1">
                        <div class="grid grid-cols-2">
                            <p class="px-4 py-2 font-semibold text-orange-900">Fecha de la jornada:</p>
                            <p class="px-2 py-2">{{ $campana->fecha->toFormattedDateString() }}</p>
                        </div>
                        <div class="grid grid-cols-2">
                            <p class="px-4 py-2 font-semibold text-orange-900">Departamento:</p>
                            <p class="px-2 py-2">{{ $campana->departamento }}</p>
                        </div>
                        <div class="grid grid-cols-2">
                            <p class="px-4 py-2 font-semibold text-orange-900">Ciudad/Municipio:</p>
                            <p class="px-2 py-2">{{ $campana->municipio }}</p>
                        </div>
                        <div class="grid grid-cols-2">
                            <p class="px-4 py-2 font-semibold text-orange-900">Direccion:</p>
                            <p class="px-2 py-2">{{ $campana->direccion }}</p>
                        </div>
                        <div class="grid grid-cols-2">
                            <p class="px-4 py-2 font-semibold text-orange-900">Hora hasta:</p>
                            <p class="px-2 py-2">{{ $hora_hasta->format('h:i') }} p.m</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-3 shadow-md rounded-md mt-2">
                <div class="grid grid-cols-1 md:grid-cols-4">
                    <div class="list-inside space-y-2 col-span-1 md:col-span-2">
                        <div>
                            <h3 class="text-orange-600">Tipo de usuario</h3>
                            <p class="uppercase">{{ $campana->vacuna->tipo_user }}</p>
                        </div>
                        <div>
                            <h3 class="text-orange-600">Tipo vacuna</h3>
                            <p class="uppercase">{{ $campana->vacuna->tipo }}</p>
                        </div>
                        <div>
                            <h3 class="text-orange-600">Precio</h3>
                            <p class="">${{ number_format($campana->vacuna->precio, 0, '.', ',') }}</p>
                        </div>
                        <div>
                            <div class="text-orange-600">Metodo de propagacion</div>
                            <div class="">{{ $campana->vacuna->propagacion }}</div>
                        </div>
                        <div>
                            <h3 class="text-orange-600">Sintomas</h3>
                            <p class="">{{ $campana->vacuna->sintomas }}</p>
                        </div>
                    </div>
                    <div class="col-span-1 md:col-span-2 rounded-md border-2 border-gray-50 hover:border-orange-300 hover:border-2 transition-colors duration-300">
                        <livewire:inscribir-campana
                            :campana="$campana"
                        />
                    </div>
                </div>
            </div>
        </div>
        <!-- End Right Side -->
    @else
        <h3 class="flex items-center justify-center text-center text-gray-500 uppercase w-full gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="orange" class="w-8 h-8">
                <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
            </svg>              
            No se pudo encontrar la jornada de vacunacion
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="orange" class="w-8 h-8">
                <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
            </svg>  
        </h3>
    @endif
</div>