<div>
    <!-- component -->
    <div class="py-4 mx-auto px-6 max-w-6xl text-gray-500">
        <h1 class="text-3xl text-green-700 font-bold text-center mb-5 uppercase my-2">{{ $campana->titulo }}</h1>
        <div class="grid gap-3 grid-cols-6">
            <div class="col-span-full md:col-span-2 overflow-hidden text-center p-4 space-y-2 rounded-md bg-white 
            shadow-md border-2 border-gray-50 hover:border-blue-300 hover:border-2 transition-colors duration-300">
                <h2 class="text-lg font-bold text-black">Vacuna</h2>
                <p class="text-blue-500 font-bold text-xl">{{ $campana->vacuna->nombre }}</p>
                <p class="text-gray-700">Tipo de vacuna: 
                    <span class="font-bold text-gray-600 uppercase">{{ $campana->vacuna->tipo }}</span>
                </p>
                <p class="text-gray-700">Precio de la vacuna: 
                    <span class="font-bold text-gray-600">{{ number_format($campana->vacuna->precio, 0, '.', ',') }}</span>
                </p>
            </div>
            <div class="col-span-full md:col-span-2 overflow-hidden relative p-4 text-center space-y-2 rounded-xl 
            bg-white shadow-md border-2 border-gray-50 hover:border-blue-300 hover:border-2 transition-colors duration-300">
                <h2 class="text-lg font-bold text-black">Usuario</h2>
                <p class="text-gray-700">Tipo de usuario: 
                    <span class="font-bold text-blue-500 text-xl uppercase">{{ $campana->vacuna->tipo_user }}</span>
                </p>
                <p class="text-gray-700">Desde: 
                    <span class="font-bold text-gray-600">{{ $campana->vacuna->edad_desde }}</span>
                </p>
                <p class="text-gray-700">Hasta: 
                    <span class="font-bold text-gray-600">{{ $campana->vacuna->edad_hasta }}</span>
                </p>
            </div>
            <div class="col-span-full md:col-span-2 overflow-hidden relative p-4 text-center space-y-2 rounded-xl
            bg-white shadow-md border-2 border-gray-50 hover:border-blue-300 hover:border-2 transition-colors duration-300">
                <h2 class="text-lg font-bold text-black">Empresa responsable</h2>
                <p class="text-gray-700">
                    <span class="font-bold text-blue-500 text-xl">{{ $campana->empresa }}</span>
                </p><p class="text-gray-700">Genero usuarios:
                    <span class="font-bold text-gray-600 uppercase">{{ $campana->vacuna->genero }}</span>
                </p>
            </div>
            <div class="col-span-full md:col-span-3 overflow-hidden relative p-4 rounded-xl bg-white shadow-md 
            border-2 border-gray-50 hover:border-blue-300 hover:border-2 transition-colors duration-300">
                <div class="grid md:grid-cols-2 gap-3">
                    <div class="overflow-hidden relative border rounded-md">
                        <img src="{{ asset('storage/campaigns/' . $campana->imagen) }}" alt="{{ 'Imagen vacante ' . $campana->titulo }}"
                        class="w-full h-full"/>
                    </div>
                    <div class="flex flex-col justify-between relative z-10 space-y-6">
                        <div class="space-y-2">
                            <h2 class="text-lg font-bold text-black">Descripción</h2>
                            <p class="text-gray-700">{{ $campana->descripcion }}</p>
                        </div>
                    </div>
                </div>
            </div>                
            <div class="col-span-full md:col-span-3 overflow-hidden relative p-4 rounded-xl bg-white shadow-md 
            border-2 border-gray-50 hover:border-blue-300 hover:border-2 transition-colors duration-300">
            <h2 class="text-lg font-bold text-black text-center">Ubicación y dirección de la campaña</h2>
                <div class="h-full grid md:grid-cols-3">
                    <div class="flex flex-col justify-between items-center md:items-start relative z-10 space-y-12 lg:space-y-6 mt-3">
                        <div class="space-y-4">
                            <p class="text-gray-500">Ubicación: 
                                <span class="font-bold text-gray-600">{{ $campana->municipio }}, {{ $campana->departamento }}</span>
                            </p>
                            <p class="text-gray-500 md:text-left text-center">Dirección: 
                                <span class="font-bold text-gray-600">{{ $campana->direccion }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="md:col-span-2 relative before:absolute before:w-px before:inset-0 before:mx-auto before:bg-gray-400 mb-6 mt-2">
                        <div class="relative flex flex-col justify-center h-full">
                            <div class="flex items-center justify-end gap-2 w-[calc(50%+0.875rem)] relative">
                                <p class="h-fit block px-2 py-1 shadow-md border rounded-md text-blue-600">Fecha: 
                                    <span class="font-bold block">{{ $campana->fecha->toFormattedDateString() }}</span>
                                </p>
                                <div class="size-7 ring-4 ring-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="w-6 h-6">
                                        <path d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                                        <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                                    </svg>                                                                                                                     
                                </div>
                            </div>
                            <div class="flex items-center gap-2 ml-[calc(50%-1rem)] relative">
                                <div class="size-7 ring-4 ring-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>                                                                                
                                </div>
                                <p class="h-fit block px-2 py-1 shadow-md border rounded-md text-green-600">Inicio:
                                    <span class="block font-bold">{{ $hora_desde->format('h:i') }} A.M</span>
                                </p>
                            </div>
                            <div class="flex items-center justify-end gap-2 w-[calc(50%+0.875rem)] relative">
                                <p class="h-fit block px-2 py-1 shadow-md border rounded-md text-red-800">Fin:
                                    <span class="block font-bold">{{ $hora_hasta->format('h:i') }} P.M</span>
                                </p>
                                <div class="size-7 ring-10 ring-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="darkred" class="w-6 h-6">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                                    </svg>                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>