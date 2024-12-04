<div>
    <div class="bg-white overflow-hidden sm:rounded-md">
        @forelse ( $campanas as $campana )
        <div class="flex flex-col sm:flex-row items-center justify-start p-4 bg-white border-b border-gray-300">
            {{-- Imagen --}}
            <div class="md:w-1/5 md:flex-none mb-4 sm:mb-0 shadow-md rounded-md">
                <div class="h-full -to-tl rounded-xl">
                    <a href="{{ route('campanas.show', $campana->titulo) }}">
                        <img src="{{ asset('storage/campaigns/'. $campana->imagen) }}" alt="{{ 'Imagen campaña ' . $campana->titulo }}"
                            class="object-cover w-full h-full rounded-md" />
                    </a>
                </div>
            </div>
            {{-- Info --}}
            <div class="max-w-full md:w-1/2 mx-4 border-r md:border-gray-300 border-white mt-5 md:mt-0 
            justify-center md:justify-start">
                <div class="block w-full ml-5">
                    <a href="{{ route('campanas.show', $campana->titulo) }}" class="text-xl font-bold bg-blue-50 py-1 
                        px-2 rounded-md shadow-sm hover:bg-blue-200">
                        {{ $campana->titulo }}
                    </a>
                </div>
                <div class="flex flex-col md:flex-row md:flex-none md:gap-32 gap-0 md:items-start items-center">
                    <div class="ml-0 md:ml-5 mt-5 md:mt-0">
                        <a  href="{{ route('vacunas.show', $campana->vacuna->nombre) }}" >
                            <p class="mt-4 text-blue-700 hover:text-blue-950 underline">Vacuna: 
                                <span class="font-semibold">{{ $campana->vacuna->nombre }}</span>
                            </p>
                        </a>
                        <p class="mt-1 text-gray-700">Tipo vacuna: 
                            <span class="text-blue-950 font-semibold uppercase">{{ $campana->vacuna->tipo }}</span>
                        </p>
                        <p class="mt-1 text-gray-700">Precio: 
                            <span class="text-blue-950 font-semibold">${{ number_format($campana->vacuna->precio, 0, '.', ',') }}</span>
                        </p>
                        <p class="mt-1 text-gray-700">Empresa: 
                            <span class="text-blue-950 font-semibold">{{ $campana->empresa }}</span>
                        </p>
                    </div>
                    <div class="py-2 mt-5 md:mt-0">
                        <p class="mt-2 text-gray-700">Tipo Usuario: 
                            <span class="text-blue-950 font-semibold uppercase">{{ $campana->vacuna->tipo_user }}</span>
                        </p>
                        <p class="mt-1 text-gray-700">Fecha: 
                            <span class="text-blue-950 font-semibold">{{ $campana->fecha->toFormattedDateString() }}</span>
                        </p>
                        <p class="mt-1 text-gray-700">Departamento: 
                            <span class="text-blue-950 font-semibold">{{ $campana->departamento }}</span>
                        </p>
                        <p class="mt-1 text-gray-700">Municipio: 
                            <span class="text-blue-950 font-semibold">{{ $campana->municipio }}</span>
                        </p>
                    </div>
                </div>
            </div>
            {{-- Botones --}}
            <div class="w-full md:w-1/5 md:flex-none">
                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                    <a  href="{{ route('inscritos.index', $campana) }}"
                        class="flex items-center justify-center bg-gray-500 hover:bg-gray-600 py-2 px-4 rounded-md 
                        text-white text-xs font-extrabold uppercase text-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 flex items-center">
                            <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z" clip-rule="evenodd" />
                            <path d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                          </svg>
                          Inscritos
                        ({{ $campana->inscritos->count() }}) 
                    </a>
                    <a  href="{{ route('campanas.edit', $campana->id) }}"
                        class="flex items-center justify-center bg-blue-500 hover:bg-blue-700 py-2 px-2 rounded-md 
                        text-white text-xs font-extrabold uppercase text-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white">
                            <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                            <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                        </svg>  
                        Editar
                    </a>
                    {{-- Pasamos el id de la campana ($campana->id) hacia el metodo de mostrarAlerta --}}
                    <button wire:click="$emit('mostrarAlerta', {{ $campana->id }})"
                        class="flex items-center justify-center bg-red-600 py-2 px-2 rounded-md text-white text-xs font-extrabold 
                        uppercase hover:bg-red-800 text-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white">
                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                        </svg>  
                        Eliminar
                    </button>
                </div>
            </div>
        </div>

        @empty
            <p class="mt-5 text-center text-sm text-gray-800 uppercase col-span-2">No hay campañas aun</p>
        @endforelse
    </div>

    {{--PAGINACION--}}
    <div class="mt-10">
        {{ $campanas->links() }}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        //Debemos pasarle el id de la vacuna (vacunaId)
        Livewire.on('mostrarAlerta', (campanaId) => {
            Swal.fire({
            title: '¿Quieres eliminar esta campaña?',
            text: "No podras revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#707070',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                //Eliminar la vacuna
                Livewire.emit('eliminarCampana', campanaId)

                //Mensaje de confirmacion
                Swal.fire(
                'Eliminado!',
                'La campaña ha sido eliminada correctamente.',
                'success'
                )
            }
            })
        });

    </script>
@endpush