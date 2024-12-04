<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Icono pestaña -->
        <link rel="icon" href="{{ asset('images/icono.png') }}" type="image/png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
        @stack('styles'){{--Depues de los estilos livewire, podemos agregar nustras propias hojas de estilos,
            los llamamos usando @push('styles') en la hoja la que los queremos usar --}}
    </head>
    <body class="font-sans antialiased">
        @if (auth()->user()->rol === 3)   
            <div class="min-h-screen bg-blue-50">
        @endif
        @if (auth()->user()->rol === 1)   
            <div class="min-h-screen bg-green-50">
        @endif
        @if (auth()->user()->rol === 2)   
            <div class="min-h-screen bg-orange-50">
        @endif

            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow-sm p-2">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @livewireScripts
        @stack('scripts'){{--Despues de los scripts de livewire, podemos agregar nuestros propios estilos, como
            los de sweetAlert, los llamamos usando @push('scripts') en la hoja la que los queremos usar--}}
        {{-- @livewireScriptConfig --}}
    </body>
</html>
