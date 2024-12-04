<div class="md:flex md:justify-center md:gap-10 md:items-center bg-gray-100">
    <div class="md:w-5/12 p-6 md:my-10 my-0">
        <a href="/" 
            class="inline-flex items-center justify-center bg-white hover:bg-gray-100 py-2 px-5
            rounded-md text-black text-xs font-extrabold uppercase text-center gap-1 shadow-md mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" class="w-7 h-7">
                    <path fill-rule="evenodd" d="M7.28 7.72a.75.75 0 0 1 0 1.06l-2.47 2.47H21a.75.75 0 0 1 0 1.5H4.81l2.47 2.47a.75.75 0 1 1-1.06 1.06l-3.75-3.75a.75.75 0 0 1 0-1.06l3.75-3.75a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                </svg> 
                Volver       
        </a>
        <x-auth-image/>
    </div>

    <div class="md:w-5/12 p-6 md:my-10 my-0">
        <a href="/">
            <x-application-logo />
        </a>

        <div class="p-6 bg-white rounded-lg shadow-xl mt-5">
            <x-guest-layout>
                <div class="flex flex-col items-center">
                    <h1 class="text-center text-blue-700 text-4xl font-bold">Recuperar tu cuenta</h1>
                    <h5 class="text-center text-blue-700 text-xl mt-2">Ingresa tu correo para buscar tu cuenta</h5>
                </div>

                <div class="border-b border-gray-300 mt-4 mb-4"></div>

                <div class="mb-4 text-sm text-gray-600">
                    {{ __('¿Olvidaste tu contraseña? No hay problema, solo dejanos tu correo electronico y te enviaremos la instrucciones para reestablecer una nueva.') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}" class="mb-0" novalidate>
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Correo electronico')" />
                        <x-text-input 
                            id="email" 
                            class="block mt-1 w-full" 
                            type="email" name="email" 
                            :value="old('email')" 
                            required autofocus 
                            placeholder="Correo electronico"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end my-4 gap-3">
                        <x-link
                                :href="route('login')"
                                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg"
                            >
                                Cancelar
                            </x-link>

                        <x-primary-button class="w-1/2 md:w-1/4">
                            {{ __('Recuperar') }}
                        </x-primary-button>
                    </div>

                    <div class="border-b border-gray-300"></div>

                    <div class="flex flex-col items-center justify-center mt-5">
                        <x-link
                            :href="route('login')"
                            class="text-blue-600  mb-5 hover:underline hover:text-blue-800"
                        >
                            ¿Ya tienes una cuenta? Inicia sesión
                        </x-link>
            
                        <x-link
                            :href="route('register')"
                            class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg"
                        >
                            Crear cuenta
                        </x-link>
                    </div>
                </form>
            </x-guest-layout>
        </div>
    </div>
</div> 