<div class=" bg-gray-100 py-20 px-7">
    <a href="/">
        <x-application-logo />
    </a>

    <div class="p-6 flex justify-center">
        <div class="p-8 bg-white rounded-lg shadow-xl max-w-3xl w-full">
            <x-guest-layout>
                <div class="mb-4 text-gray-600 text-center">
                    {{ __('¡Gracias por registrarte!') }}<br>
                    {{ __('Necesitas verificar tu cuenta para poder continuar, presiona sobre el enlace de verificacion y revisa tu correo electronico') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 text-center">
                        {{ __('Un nuevo link de verificacion a sido enviado a tu direccion de correo electronico que proporcionaste durante el registro') }}
                    </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <x-primary-button class="bg-blue-600 hover:bg-blue-700">
                                {{ __('Enviar correo de verificacion') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg">
                            {{ __('Cancelar') }}
                        </button>
                    </form>
                </div>
            </x-guest-layout>
        </div>
    </div>
</div>