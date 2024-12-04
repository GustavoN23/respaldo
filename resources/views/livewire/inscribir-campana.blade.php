<div class="p-3 shadow-md rounded-md mt-3 md:mt-0">
    <?php
        // SDK de Mercado Pago
        use MercadoPago\MercadoPagoConfig;
        use MercadoPago\Client\Preference\PreferenceClient;
        use App\Models\Pago;
        
        // Agrega credenciales
        MercadoPagoConfig::setAccessToken(config('services.mercadopago.token'));

        if($this->campana->vacuna->precio !== 0) {

            $client = new PreferenceClient();
            $preference = $client->create([
                "external_reference" => $this->campana->id,
                "items"=> array(
                    array(
                        "id" => $this->campana->vacuna->id,
                        "title" => $this->campana->vacuna->nombre,
                        "quantity" => 1,
                        "unit_price" => $this->campana->vacuna->precio
                    )
                )
            ]);

        } else {
            $preference = null;
        }
    ?>
    <h2 class="text-center text-xl font-bold">Inscribete a esta jornada de vacunación</h2>
    
    <div class="border-b border-gray-300 mt-3 mb-3"></div>

    @if (session()->has('inscrito'))
        <p class="uppercase border border-orange-600 bg-orange-100 text-orange-600 font-bold p-2 my-3 text-center 
            flex justify-center py-2 px-2 rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="red" class="w-12 h-12">
                <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
            </svg>
                {{ session('inscrito') }}
        </p>
    @else
        @if (session()->has('mensaje'))
            <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-center 
                flex justify-center py-2 px-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12">
                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                </svg>
                    {{ session('mensaje') }}
            </p> 
        @else
            <form action="" wire:submit.prevent='inscribirme'>
                <div>
                    <x-input-label for="genero" :value="__('Ingrese su genero')" />
                    <select 
                        wire:model="genero" 
                        id="genero" 
                        class="border-gray-300 mt-1 focus:border-blue-500 focus:ring-blue-500 rounded-md w-full"
                    >
                    <option value="" selected disabled>--Seleccione--</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    </select>

                    @error('genero')
                        <livewire:mostrar-alerta :message="$message" />
                    @enderror
                </div>
                <div>
                    <x-input-label for="documento" :value="__('Ingrese su número de documento')" />
                    <x-text-input 
                        id="documento" 
                        class="block mt-1 w-full"
                        type="number"
                        wire:model="documento"
                        :value="old('documento')"
                        placeholder="Documento de identificación"
                    />

                    @error('documento')
                        <livewire:mostrar-alerta :message="$message" />
                    @enderror
                </div>

                <div class="border-b border-gray-300 mt-4 mb-5"></div>

                @if ($campana->vacuna->precio !== 0)
                    <div id="wallet_container"></div>
                @else
                    <x-primary-button class="w-full bg-blue-600 hover:bg-blue-800">
                        Inscribirme
                    </x-primary-button>
                @endif
                
            </form>
        @endif
    @endif

    {{-- SDK MercadoPago.js --}}
    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <script>
        const mp = new MercadoPago("{{config('services.mercadopago.key')}}");
        const bricksBuilder = mp.bricks();

        //Verificar si $preference esta definido antes de usarlo
        @if ($preference)
            //Si la vrble $preference es un objeto de tipo (vacuna de pago)
            @if (is_object($preference))
                mp.bricks().create("wallet", "wallet_container", {
                    initialization: {
                        preferenceId: "{{$preference->id}}",
                    },
                        customization: {
                        texts: {
                        valueProp: 'smart_option',
                        },
                    },
                }); 
            @else //Si $preference no es un objeto de tipo (vacuna de pago)
                console.log("Vacuna gratuita: {{$preference}}");
            @endif
        @endif
    </script>
</div>