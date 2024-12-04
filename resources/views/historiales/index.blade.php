<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historial de vacunacion') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl text-black text-center mt-5 mb-4 font-bold">Historial de vacunación</h1>
                    <div class="px-0 md:px-20">
                        <livewire:mostrar-historiales />
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
