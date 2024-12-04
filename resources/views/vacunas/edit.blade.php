<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar vacuna') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{--Gracias al RMB tenemos acceso a la vrble $vacuna con toda su info--}}
                    <h1 class="text-4xl text-blue-800 text-center mt-8">Editar vacuna: 
                        <span class="font-bold text-blue-700">{{ $vacuna->nombre }}</span>
                    </h1>
                    <div class="md:flex md:justify-center p-5">

                        {{--Pasamos la vrble a la vista livewire--}}
                        <livewire:editar-vacuna 
                            :vacuna="$vacuna"
                        />
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
