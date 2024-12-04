<x-guest-layout>
    <x-nav />
        <div class="grid md:grid-cols-2 items-center my-6 gap-16 p-8 mx-auto max-w-4xl bg-white shadow-md rounded-md text-gray-800 font-[sans-serif]">
            <div>
                <h1 class="text-3xl font-extrabold">Contacta con el soporte de Ur'vaccine</h1>
                <div class="mt-4 flex justify-center items-center shadow-md rounded-md">
                    <img src="{{ asset('images/img4.jpg') }}" alt="Imagen urvaccine" class="w-auto h-60">
                </div>
                <div class="mt-4">
                    <h2 class="text-lg font-extrabold">Nuestra dirección email</h2>
                    <ul class="mt-1">
                        <li class="flex items-center">
                            <div class="bg-gray-200 h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#007bff' viewBox="0 0 479.058 479.058">
                                    <path d="M434.146 59.882H44.912C20.146 59.882 0 80.028 0 104.794v269.47c0 24.766 20.146 44.912 44.912 44.912h389.234c24.766 0 44.912-20.146 44.912-44.912v-269.47c0-24.766-20.146-44.912-44.912-44.912zm0 29.941c2.034 0 3.969.422 5.738 1.159L239.529 264.631 39.173 90.982a14.902 14.902 0 0 1 5.738-1.159zm0 299.411H44.912c-8.26 0-14.971-6.71-14.971-14.971V122.615l199.778 173.141c2.822 2.441 6.316 3.655 9.81 3.655s6.988-1.213 9.81-3.655l199.778-173.141v251.649c-.001 8.26-6.711 14.97-14.971 14.97z" data-original="#000000" />
                                </svg>
                            </div>
                            <a target="blank" href="#" class="text-blue-600 text-sm ml-3">
                                <small class="block">Mail</small>
                                <strong>urvaccine@gmail.com</strong>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        
            <form class="space-y-4">
                <input 
                    type='text' 
                    name ="name" 
                    placeholder='Ingresa tu nombre'
                    class="w-full rounded-md py-2.5 px-4 text-sm" 
                />
                <input 
                    type='email' 
                    name='email'
                    placeholder='Tu dirección de correo'
                    class="w-full rounded-md py-2.5 px-4 text-sm" 
                />
                <input 
                    type='text' 
                    placeholder='Asunto' 
                    name='subject' 
                    class="w-full rounded-md py-2.5 px-4 text-sm" 
                />
                <textarea 
                    placeholder='Mensaje' 
                    rows="6"
                    name='message'
                    class="w-full rounded-md px-4 text-sm pt-2.5"
                ></textarea>
                <button  type="submit" class="text-white bg-blue-600 hover:bg-blue-700 font-semibold rounded-md text-sm px-4 py-2.5 w-full shadow-md">
                    Enviar
                </button>
            </form>
        </div>
    <x-footer />
</x-guest-layout>