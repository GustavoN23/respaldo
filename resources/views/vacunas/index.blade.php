<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vacunas') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session()->has('mensaje'))
                <div class="flex flex-row justify-center uppercase border border-green-600 bg-green-100 text-green-800 font-bold p-2 my-3 text-center rounded-md mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    {{ session('mensaje') }}
                </div>                
            @endif

                <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <livewire:mostrar-vacunas />
                    </div>
                </div>
        </div>
    </div>
</x-app-layout>
