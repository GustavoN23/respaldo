<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="px-8 md:px-28 py-8">
        {{--NUEVAS DE NOTIFICACIONES--}}
        <div class="mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white shadow-md sm:rounded-lg py-8">
                <h1 class="text-2xl font-bold text-center mb-10">Nuevas notificaciones</h1>
    {{--
        En la tabla notifications tenemos una columna llamada data (accedemos a ella con ->), y dentro de
        data tenemos un array con distinta info (accedemos a estos con [])
    --}}
                @forelse ($notificaciones as $notificacion)
                    <div class="p-5 border border-gray-200 md:flex md:justify-between md:items-center
                    hover:bg-gray-100 mt-2 rounded-lg mx-8">
                    <div class="grid grid-cols-2 md:grid-cols-12">
                        <div class="col-span-2 md:col-span-1 flex justify-center md:justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="w-7 h-7">
                                <path d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
                            </svg>                                                                  
                        </div> 
                        <div class="col-span-2 md:col-span-11 text-center md:text-left">
                            <p>Se ha inscrito un nuevo usuario en:
                                <span class="font-bold">{{ $notificacion->data['nombre_campana'] }}</span>
                            </p>
                            <p class="font-bold text-gray-600 hover:text-gray-800">{{ $notificacion->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 mr-0 md:mr-5">
                        <a href="{{ route('inscritos.index', $notificacion->data['id_campana']) }}" 
                        class="flex items-center justify-center bg-gray-500 hover:bg-gray-600 py-3 px-4 rounded-md 
                        text-white text-xs font-extrabold uppercase text-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 flex items-center">
                            <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z" clip-rule="evenodd" />
                            <path d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                        </svg>
                            Ver inscritos
                        </a>
                    </div>
                </div>
                @empty  
                    <p class="text-center text-gray-500">No hay notificaciones nuevas que mostrar</p>
                @endforelse
            </div>
        </div>
    {{--FIN NUEVAS DE NOTIFICACIONES--}}

    {{--HISTORIAL DE NOTIFICACIONES--}}
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-lg py-8">
                <h1 class="text-2xl font-bold text-center text-gray-600 mb-10">Historial de notificaciones</h1>
                @forelse ($historialNotificaciones as $historialNotificacion)
                    <div class="p-5 border border-gray-200 md:flex md:justify-between md:items-center
                        bg-gray-100 hover:bg-gray-200 mt-2 rounded-lg mx-8">
                        <div class="grid grid-cols-2 md:grid-cols-12">
                            <div class="col-span-2 md:col-span-1 flex justify-center md:justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="w-7 h-7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                                </svg>                                                                
                            </div> 
                            <div class="col-span-2 md:col-span-11 text-center md:text-left">
                                <p>Se ha inscrito un nuevo usuario en:
                                    <span class="font-bold">{{ $historialNotificacion->data['nombre_campana'] }}</span>
                                </p>
                                <p class="font-bold text-gray-600 hover:text-gray-800">{{ $historialNotificacion->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 mr-0 md:mr-5">
                            <a href="{{ route('inscritos.index', $historialNotificacion->data['id_campana']) }}" 
                            class="flex items-center justify-center bg-gray-500 hover:bg-gray-600 py-3 px-4 rounded-md 
                            text-white text-xs font-extrabold uppercase text-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 flex items-center">
                                <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z" clip-rule="evenodd" />
                                <path d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                            </svg>
                                Ver inscritos
                            </a>
                        </div>
                    </div>
                @empty  
                    <p class="text-center text-gray-500">No tienes notificaciones en tu historial</p>
                @endforelse
            </div>
        </div>
        {{--FIN HISTORIAL DE NOTIFICACIONES--}}
    </div>
</x-app-layout>