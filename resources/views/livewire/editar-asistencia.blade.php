<div class="md:mx-64 mx-10">
        <a href="{{ route('inscritos.index', $inscrito->campana->id) }}" 
        class="inline-flex items-center justify-center bg-gray-300 hover:bg-gray-400 py-2 px-5
        rounded-md text-black text-xs font-extrabold uppercase text-center gap-1 shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" class="w-7 h-7">
                <path fill-rule="evenodd" d="M7.28 7.72a.75.75 0 0 1 0 1.06l-2.47 2.47H21a.75.75 0 0 1 0 1.5H4.81l2.47 2.47a.75.75 0 1 1-1.06 1.06l-3.75-3.75a.75.75 0 0 1 0-1.06l3.75-3.75a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
            </svg> 
            Volver       
        </a>
        {{-- <p>{{$inscrito->campana->vacuna->precio}}</p> --}}

    <div class="md:flex md:justify-center mb-5">
        <div class="grid grid-cols-1">
            
            @if (session()->has('mensaje'))
                <div class="flex flex-row justify-center uppercase border border-green-600 bg-green-100 text-green-800 font-bold p-2 my-3 text-center rounded-md mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    {{ session('mensaje') }}
                </div>   
                
            @else

                <form class="gap-10" wire:submit.prevent='editarAsistencia'>

                    <div class="flex flex-col justify-center items-center mb-5">
                        <x-input-label for="asistio" :value="__('Asistio')" class="text-xl uppercase"/>
                        <x-text-input 
                            class="mt-3 w-10 h-10 rounded-xl cursor-pointer"
                            id="asistio" 
                            type="checkbox"
                            wire:model="asistio"
                        />{{--En livewire en ves de poner name="" ponemos wire:model="" para que se comunique con el backend--}}
                    </div>

                    <div class="mb-5">
                        <x-input-label for="edad" :value="__('Edad del usuario al dia de la aplicación')" class="text-xl"/>
                        <x-text-input 
                            id="edad" 
                            class="block mt-1 w-full"
                            type="text"
                            wire:model="edad"
                            :value="old('edad')"
                            placeholder="Edad del usuario (años, meses o dias)"
                        />
            
                        @error('edad')
                            <livewire:mostrar-alerta :message="$message" />
                        @enderror
                    </div>

                    <x-primary-button class="w-full block bg-green-600 hover:bg-green-700 shadow-md">
                        Marcar asistencia
                    </x-primary-button>
                </form>    
            @endif
            
        </div>
    </div>
</div>