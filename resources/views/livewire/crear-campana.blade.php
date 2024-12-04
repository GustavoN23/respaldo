<form class="mx-auto mt-5 w-full md:w-1/2 md:mt-5" wire:submit.prevent='crearCampana'>

    <div class="border-b border-gray-300 mb-10"></div>

    <div class="grid grid-cols-1 gap-x-8 gap-y-6 md:grid-cols-2">

        {{--Titulo--}}
        <div class="md:col-span-2">
            <x-input-label for="titulo" :value="__('Titulo de la jornada')" />
            <x-text-input 
                id="titulo" 
                class="block mt-1 w-full"
                type="text"
                wire:model="titulo"
                :value="old('titulo')"
                placeholder="Titulo Jornada"
            />{{--En livewire en ves de poner name="" ponemos wire:model="" para que se comunique con el backend--}}

            @error('titulo')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Vacuna--}}
        <div class="md:col-span-2">
            <x-input-label for="vacuna" :value="__('Vacuna de la jornada')" />
            <select 
                wire:model="vacuna" 
                id="vacuna" 
                class="border-gray-300 mt-1 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-md w-full"
            >
            <option value="" selected disabled>--Seleccione--</option>
            @foreach ($vacunas as $vacuna)
            {{--Filtrando que un usuario solo pueda crear campañas con vacunas que el mismo creo--}}
                @if ((auth()->user()->id) === $vacuna->user_id)
                    <option value="{{ $vacuna->id }}">{{ $vacuna->nombre }}</option>
                @endif
            @endforeach

            </select>
            @error('vacuna')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Fecha--}}
        <div class="md:col-span-2">
            <x-input-label for="fecha" :value="__('Fecha')" />
            <x-text-input 
                id="fecha" 
                class="block mt-1 w-full"
                type="date"
                wire:model="fecha"
                :value="old('fecha')"
                min="{{ date('Y-m-d') }}"
            />

            @error('fecha')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Hora_desde--}}
        <div>
            <x-input-label for="hora_desde" :value="__('Hora inicio de la jornada')" />
            <x-text-input 
                id="hora_desde" 
                class="block mt-1 w-full"
                type="time"
                wire:model="hora_desde"
                :value="old('hora_desde')"
                max="19:00"
                min="06:00"  
            />

            @error('hora_desde')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Hora_hasta--}}
        <div>
            <x-input-label for="hora_hasta" :value="__('Hora fin de la jornada')" />
            <x-text-input 
                id="hora_hasta" 
                class="block mt-1 w-full"
                type="time"
                wire:model="hora_hasta"
                :value="old('hora_hasta')"
                max="19:00"
                min="06:00"  
            />

            @error('hora_hasta')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Departamento--}}
        <div>
            <x-input-label for="departamento" :value="__('Elija departamento de la jornada')" />
            <select 
                wire:model="selectedDepartamento" 
                id="departamento" 
                class="border-gray-300 mt-1 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-md w-full"
            >
            <option value="" selected disabled>--Seleccione--</option>
            @foreach($departamentos as $departamento)
                <option value="{{ $departamento['departamento'] }}">{{ $departamento['departamento'] }}</option>
            @endforeach
            </select>

            @error('selectedDepartamento')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Municipio--}}
        <div>
            <x-input-label for="municipio" :value="__('Elija ciudad/municipio de la jornada')" />
            <select 
                wire:model="municipio" 
                id="municipio" 
                class="border-gray-300 mt-1 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-md w-full"
            >
            <option value="" selected disabled>--Seleccione--</option>
            @foreach($municipios as $municipio)
                <option value="{{ $municipio }}">{{ $municipio }}</option>
            @endforeach
            </select>

            @error('municipio')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Direccion--}}
        <div class="md:col-span-2">
            <x-input-label for="direccion" :value="__('Direccion')" />
            <x-text-input 
                id="direccion" 
                class="block mt-1 w-full"
                type="text"
                wire:model="direccion"
                :value="old('direccion')"
                placeholder="Direccion de jornada"
            />

            @error('direccion')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Empresa--}}
        <div class="md:col-span-2">
            <x-input-label for="empresa" :value="__('Empresa responsable')" />
            <x-text-input 
                id="empresa" 
                class="block mt-1 w-full"
                type="text"
                wire:model="empresa"
                :value="old('empresa')"
                placeholder="Empresa"
            />

            @error('empresa')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Imagen--}}
        <div class="md:col-span-2">
            <x-input-label for="imagen" :value="__('Imagen promocional')" />
            <x-text-input 
                id="imagen" 
                class="block mt-1 w-full"
                type="file"
                wire:model="imagen"
                accept="image/*"
            />

            @error('imagen')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        {{--Descripcion--}}
        <div class="md:col-span-2">
            <x-input-label for="descripcion" :value="__('Descripcion de la jornada')" />
            <textarea 
                wire:model="descripcion" 
                id="descripcion" 
                class="border-gray-300 mt-1 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-md w-full h-40"
                placeholder="Ingrese indicaciones, tipos de usuarios, posibles costos y la enfermedad a tratar"
            ></textarea>
            @error('descripcion')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>
    </div>

    <div class="border-b border-gray-300 mt-6 mb-7"></div>

    <x-primary-button class="w-full bg-green-600 hover:bg-green-700">
        Crear Jornada
    </x-primary-button>
</form>