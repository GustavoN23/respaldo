<div class="md:flex md:justify-center md:gap-10 md:items-center bg-gray-100">
    <div class="md:w-5/12 p-6 md:my-10 my-0">
        <x-auth-image/>
    </div>

    <div class="md:w-5/12 p-6 md:my-10 my-0">
        <a href="/">
            <x-application-logo />
        </a>

        <div class="p-6 bg-white rounded-lg shadow-xl mt-5">
            <x-guest-layout>
                <div class="flex flex-col items-center">
                    <h1 class="text-center text-blue-700 text-4xl font-bold">Restablezca su nueva contraseña</h1>
                </div>

                <div class="border-b border-gray-300 mt-4 mb-4"></div>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Correo electronico')" />
                        <x-text-input 
                            id="email" 
                            class="block mt-1 w-full" 
                            type="email" 
                            name="email" 
                            :value="old('email', $request->email)" 
                            required autofocus autocomplete="username" 
                            placeholder="Correo electronico"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Nueva contraseña')" />
                        <x-text-input 
                            id="password" 
                            class="block mt-1 w-full" 
                            type="password" 
                            name="password" 
                            required autocomplete="new-password" 
                            placeholder="Nueva contraseña"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Repita su contraseña')" />

                        <x-text-input 
                            id="password_confirmation" 
                            class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" 
                            required autocomplete="new-password" 
                            placeholder="Repita su contraseña"
                        />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    
                    <div class="border-b border-gray-300 mt-4 mb-4"></div>

                    <div class="flex items-center justify-center mt-4">
                        <x-primary-button class="bg-green-600 hover:bg-green-700">
                            {{ __('Restablecer contraseña') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-guest-layout>
        </div>
    </div>
</div>