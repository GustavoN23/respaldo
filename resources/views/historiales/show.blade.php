<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historial de jornada') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl text-black text-center mt-5 mb-6">Jornada de vacunación:
                        <span class="font-bold">{{ $inscrito->campana->titulo }}</span>
                    </h1>
                    <div class="px-0 md:px-20">
                        <livewire:mostrar-historial 
                            :inscrito="$inscrito"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
