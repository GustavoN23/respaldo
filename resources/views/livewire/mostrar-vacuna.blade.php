<div>
    <!-- component -->
    <div class="flex items-center bg-white justify-center rounded-xl lg:h-screen">
        <div class="w-11/12 sm:w-11/12 md:w-9/12 bg-white p-6 rounded-lg">
            <h1 class="text-4xl text-blue-700 font-bold text-center mb-8">{{ $vacuna->nombre }}</h1>
            <div class="grid grid-cols-1 w-full md:grid-cols-2 gap-10 text-center">
                <!-- Card 1 -->
                <div class="flex flex-col justify-center bg-white/20 p-12 rounded-md shadow-md border-2 border-gray-50 hover:border-blue-300 hover:border-2 transition-colors duration-300">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Tipo de usuario: 
                        <span class="font-normal text-blue-500 uppercase">{{ $vacuna->tipo_user }}</span>
                    </h2>
                    <p class="text-gray-700 text-lg">Genero: 
                        <span class="text-blue-950 font-semibold uppercase">{{ $vacuna->genero }}</span>
                    </p>
                </div>
                <!-- Card 2 -->
                <div class="flex flex-col justify-center bg-white/20 p-12 rounded-md shadow-md border-2 border-gray-50 hover:border-blue-300 hover:border-2 transition-colors duration-300">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Tipo de vacuna: 
                        <span class="font-normal text-blue-500 uppercase">{{ $vacuna->tipo }}</span>
                    </h2>
                    <p class="text-gray-700 text-lg">Precio de la vacuna: 
                        <span class="text-blue-950 font-semibold">${{ number_format($vacuna->precio, 0, '.', ',') }}</span>
                    </p>
                </div>
                <!-- Card 3 -->
                <div class="flex flex-col justify-center bg-white/20 p-12 rounded-md shadow-md border-2 border-gray-50 hover:border-blue-300 hover:border-2 transition-colors duration-300">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Edades: 
                        <span class="font-normal text-blue-500">({{ $vacuna->edad_desde }} - {{ $vacuna->edad_hasta }})</span>
                    </h2>
                    <p class="text-gray-700 mb-3 text-lg">Desde: 
                        <span class="text-blue-950 font-semibold">{{ $vacuna->edad_desde }}</span>
                    </p>
                    <p class="text-gray-700 text-lg">Hasta: 
                        <span class="text-blue-950 font-semibold">{{ $vacuna->edad_hasta }}</span>
                    </p> 
                </div>
                <!-- Card 4 -->
                <div class="flex flex-col justify-center bg-white/20 p-12 rounded-md shadow-md border-2 w-full border-gray-50 hover:border-blue-300 hover:border-2 transition-colors duration-300">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Enfermedad que previene: 
                        <span class="font-normal text-blue-500 uppercase">{{ $vacuna->enfermedad }}</span>
                    </h2>
                    <p class="text-gray-700 text-lg">Propagación: 
                        <span class="text-blue-950 font-semibold">{{ $vacuna->propagacion }}</span>
                    </p>
                    <p class="text-gray-700 text-lg">Sintomas: 
                        <span class="text-blue-950 font-semibold">{{ $vacuna->sintomas }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>