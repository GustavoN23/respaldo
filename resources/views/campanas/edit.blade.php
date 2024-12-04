<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar jornada') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl text-green-800 text-center mt-8">Editar Jornada: 
                        <span class="font-bold text-green-700">{{ $campana->titulo }}</span>
                    </h1>
                    <div class="md:flex md:justify-center p-5">

                        <livewire:editar-campana
                            :campana="$campana"
                        />
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
