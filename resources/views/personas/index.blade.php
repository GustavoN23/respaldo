<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jornadas de vacunación') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="sm:px-6 lg:px-8"> 
            <div class="bg-white overflow-hidden shadow-md p-6 sm:rounded-lg">
                <livewire:persona-campanas />
            </div>
        </div>
    </div>
    
</x-app-layout>