<div>
    <ul role="list" class="grid grid-cols-1 gap-6 md:grid-cols-2">

        @forelse ( $vacunas as $vacuna )

        <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow">
            <div class="flex w-full items-center justify-between space-x-6 p-6">
                <div class="flex-1 truncate">
                    <div class="flex items-center space-x-3">
                        <a  href="{{ route('vacunas.show', $vacuna->nombre) }}">
                            <h1 class="truncate font-bold text-2xl text-gray-900">{{ $vacuna->nombre }}</h1>
                        </a>
                        <span class="inline-flex flex-shrink-0 items-center rounded-full bg-green-50 px-3
                            py-1.5 text-xs font-bold text-green-600 ring-1 ring-inset ring-green-600/20 uppercase">
                            {{ $vacuna->tipo_user }}
                        </span>
                    </div>
                    <p class="mt-1 truncate text-gray-500 uppercase">{{ $vacuna->tipo }}</p>
                    <p class="mt-1 truncate text-gray-500">
                        Precio: <span class="font-bold text-gray-800">${{ number_format($vacuna->precio, 0, '.', ',')  }}</span>
                    </p>
                </div>
                <p class="text-gray-500">
                    Genero: <span class="uppercase text-black">{{ $vacuna->genero }}</span>
                </p>
            </div>
            <div class="-mt-px flex divide-x divide-gray-200">
                <div class="flex w-0 flex-1">
                    <a  href="{{ route('vacunas.show', $vacuna->nombre) }}" 
                        class="text-white bg-gray-700 hover:bg-gray-800 relative inline-flex w-0 
                        flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent 
                        py-4 text-sm font-semibold"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm0 8.625a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM15.375 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0ZM7.5 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z" clip-rule="evenodd" />
                        </svg>    
                        Ver más
                    </a>
                </div>
                <div class="-ml-px flex flex-1">
                    <a  href="{{ route('vacunas.edit', $vacuna->id) }}" 
                        class="text-white bg-blue-500 hover:bg-blue-700 relative inline-flex flex-1 items-center 
                        justify-center gap-x-3 border border-transparent py-4 text-sm font-semibold"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                            <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                            <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                        </svg>  
                        Editar
                    </a>
                </div>
                <div class="-ml-px flex flex-1">
                    {{--
                        Pasamos el id de la vacuna ($vacuna->id) hacia el metodo de mostrarAlerta
                        wire:click="$emit('mostrarAlerta', {{ $vacuna->id }})"    
                    --}}
                    <button 
                        wire:click="$emit('mostrarAlerta', {{ $vacuna->id }})" 
                        class="text-white bg-red-600 hover:bg-red-700 relative inline-flex flex-1 
                        items-center justify-center rounded-br-lg border border-transparent py-4 text-sm font-semibold ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                        </svg>  
                        Eliminar
                    </button>
                </div>
            </div>
        </li>
        @empty
            <p class="mt-5 text-center text-sm text-gray-800 uppercase col-span-2">No hay vacunas aún</p>
        @endforelse
    </ul>

    <div class="mt-10">
        {{ $vacunas->links() }}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    
    <script>
        //Debemos pasarl el id de la vacuna (vacunaId)
        Livewire.on('mostrarAlerta', (vacunaId) => {
            Swal.fire({
            title: '¿Quieres eliminar esta vacuna?',
            text: "No podras revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#707070',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                //Eliminar la vacante
                Livewire.emit('eliminarVacuna', vacunaId)

                //Mensaje de confirmacion
                Swal.fire(
                'Eliminado!',
                'La vacuna ha sido eliminada correctamente.',
                'success'
                )
            }
            })
        });
    </script>
@endpush