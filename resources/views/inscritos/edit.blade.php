<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Asistencia usuario') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl text-blue-800 text-center mt-4">Usuario: 
                        <span class="font-bold text-blue-700">{{ $inscrito->user->name }}</span>
                    </h1>
                    <div>
                        <livewire:editar-asistencia
                            :inscrito="$inscrito"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>