<div>
    <a href="{{ route('historiales.index') }}" class="inline-flex items-center justify-center bg-gray-300 mb-5
    hover:bg-gray-400 py-2 px-5 rounded-md text-black text-xs font-extrabold uppercase text-center gap-1 shadow-md"
    >
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" class="w-7 h-7">
        <path fill-rule="evenodd" d="M7.28 7.72a.75.75 0 0 1 0 1.06l-2.47 2.47H21a.75.75 0 0 1 0 1.5H4.81l2.47 2.47a.75.75 0 1 1-1.06 1.06l-3.75-3.75a.75.75 0 0 1 0-1.06l3.75-3.75a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
    </svg> 
        Volver
    </a>
    
    <div class="p-3">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
            <div class="rounded-md border border-gray-100 p-6 shadow-md hover:bg-gray-100 transition duration-500">
                <div class="mx-2 text-lg">
                    <p class="font-bold">Nombre usuario: 
                        <span class="font-normal text-gray-600">{{ $inscrito->user->name }}</span>
                    </p>
                    <p class="font-bold">Apellidos: 
                        <span class="font-normal text-gray-600">{{ $inscrito->user->apellido }}</span>
                    </p>
                    <p class="font-bold">Documento: 
                        <span class="font-normal text-gray-600">{{ $inscrito->user->documento }}</span>
                    </p>
                </div>
            </div>
            <div class="rounded-md border border-gray-100 p-6 shadow-md hover:bg-gray-100 transition duration-500">
                <div class="mx-2 text-lg">
                    <p class="font-bold">Vacuna: 
                        <span class="font-normal text-gray-600">{{ $inscrito->campana->vacuna->nombre }}</span>
                    </p>
                    <p class="font-bold">Tipo: 
                        <span class="font-normal uppercase text-gray-600">{{ $inscrito->campana->vacuna->tipo }}</span>
                    </p>
                    <p class="font-bold">Precio: 
                        <span class="font-normal text-gray-600">${{ number_format($inscrito->campana->vacuna->precio, 0, '.', ',') }}</span>
                    </p>
                </div>
            </div>
            <div class="rounded-md border border-gray-100 p-6 shadow-md hover:bg-gray-100 transition duration-500">
                <div class="mx-1 text-lg">
                    <p class="font-bold">Fecha nacimiento: 
                        <span class="font-normal text-gray-600">{{ $inscrito->user->nacimiento->toFormattedDateString() }}</span>
                    </p>
                    <p class="font-bold">Edad: 
                        <span class="font-normal text-gray-600">{{ $inscrito->edad }}</span>
                    </p>
                    <p class="font-bold">Genero: 
                        <span class="font-normal uppercase text-gray-600">{{ $inscrito->user->genero }}</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
            <div class="rounded-md border border-gray-100 p-6 shadow-md hover:bg-gray-100 transition duration-500">
                <div class="mx-2 text-lg">
                    <h3 class="font-bold">Me proteje de:</h3>
                    <p class="text-gray-600">{{ $inscrito->campana->vacuna->enfermedad }}</p>
                    <h3 class="font-bold">Medio de propagación:</h3>
                    <p class="text-gray-600">{{ $inscrito->campana->vacuna->propagacion }}</p>
                    <h3 class="font-bold">Sintomas de la enfermedad:</h3>
                    <p class="text-gray-600">{{ $inscrito->campana->vacuna->sintomas }}</p>
                </div>
            </div>
            <div class="rounded-md border border-gray-100 p-6 shadow-md hover:bg-gray-100 transition duration-500">
                <div class="mx-2 text-lg">
                    <h3 class="font-bold">Empresa vacunadora:</h3>
                    <p class="text-gray-600">{{ $inscrito->campana->empresa }}</p>
                    <h3 class="font-bold">Fecha de aplicación:</h3>
                    <p class="text-gray-600">{{ $inscrito->campana->fecha->toFormattedDateString() }}</p>
                    <h3 class="font-bold">Tipo de usuario:</h3>
                    <p class="uppercase text-gray-600">{{ $inscrito->campana->vacuna->tipo_user }}</p>
                    <h3 class="font-bold">Lote Vacuna:</h3>
                    <p class="uppercase text-gray-600">{{ $inscrito->campana->vacuna->Lote }}</p>
                </div>
            </div>
            <div class="rounded-md border border-gray-100 p-6 shadow-md hover:bg-gray-100 transition duration-500">
                <div class="mx-2 text-lg">
                    <h3 class="font-bold">Dirección:</h3>
                    <p class="text-gray-600">{{ $inscrito->campana->direccion }}</p>
                    <h3 class="font-bold">Ciudad/municipio:</h3>
                    <p class="text-gray-600">{{ $inscrito->campana->municipio }}</p>
                    <h3 class="font-bold">Departamento:</h3>
                    <p class="text-gray-600">{{ $inscrito->campana->departamento }}</p>
                </div>
            </div>
        </div>
    </div>
</div>