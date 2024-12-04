<x-guest-layout>
    <x-nav />
        <div class="bg-white my-10 mx-10 rounded-md shadow-md">
            <div class="w-full pr-5 pl-5 mt-0 mr-auto mb-0 ml-auto space-y-5 md:py-12 sm:space-y-8 md:space-y-16
                max-w-7xl">
                <div class="flex flex-col items-center sm:px-5 md:flex-row">
                    <div class="flex flex-col items-start justify-center w-full h-full pt-6 pr-0 pb-6 pl-0 mb-6 md:mb-0 md:w-1/2">
                        <div class="flex flex-col items-start justify-center h-full space-y-3 transform md:pr-10 lg:pr-16
                            md:space-y-5">
                            <div class="bg-blue-500 flex items-center leading-none rounded-full text-gray-50 pt-1.5 pr-3 pb-1.5 pl-2
                                uppercase">
                                <p class="inline">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </p>
                                <p class="inline text-xs font-medium">Disponible en todo el territorio nacional</p>
                            </div>
                            <h1 class="text-4xl font-bold leading-none lg:text-5xl xl:text-6xl">Bienvenido a Ur'vaccine</h1>
                            <p class="font- text-gray-600 inline">Vacunación para personas y mascotas, ¡cuidando de tu salud y la de tus seres queridos!</p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <div class="block shadow-md rounded-md">
                            <img src="{{ asset('images/persona.jpg') }}" class="object-cover rounded-lg max-h-64 sm:max-h-96 btn- w-full h-full"/>
                        </div>
                    </div>
                </div>
                <div class="border-b border-gray-300 mt-2 mb-2 mx-8"></div>
                <div class="grid grid-cols-12 sm:px-5 gap-x-8 gap-y-16">
                    <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                        <img src="{{ asset('images/mascota.jpg') }}" class="object-cover w-full mb-2 overflow-hidden shadow-md rounded-md max-h-56 btn-"/>
                        <p class="bg-blue-500 flex items-center leading-none text-sm font-medium text-gray-50 pt-1.5 pr-3 pb-1.5 pl-3
                            rounded-full uppercase">Transparencia
                        </p>
                        <h3 class="text-lg font-bold sm:text-xl md:text-2xl">Promoviendo la Transparencia en la Gestión de Vacunación</h3>
                        <p class="text-sm text-black">
                            Ur'vaccine se compromete a promover la transparencia en la gestión de vacunación en Colombia, brindando acceso fácil y seguro a los registros de vacunación tanto para las personas como para sus mascotas. Nuestra plataforma garantiza la veracidad y la confiabilidad de la información, contribuyendo así a una mejor salud pública y al bienestar de la comunidad.
                        </p>
                        <div class="pt-2">
                            <p class="inline text-xs font-medium mt-0 mr-1 mb-0 ml-0 underline">Mascotas</p>
                            <p class="inline text-xs font-medium mt-0 mr-1 mb-0 ml-1">· 5 Abril 2024 ·</p>
                            <p class="inline text-xs font-medium text-gray-400 mt-0 mr-1 mb-0 ml-1">Medellín, Antioquia</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                        <img src="{{ asset('images/img5.jpg') }}" class="object-cover w-full mb-2 overflow-hidden rounded-md shadow-md max-h-56 btn-"/>
                        <p class="bg-blue-500 flex items-center leading-none text-sm font-medium text-gray-50 pt-1.5 pr-3 pb-1.5 pl-3
                            rounded-full uppercase">Eficiencia
                        </p>
                        <h3 class="text-lg font-bold sm:text-xl md:text-2xl">Impulsando la Eficiencia en la Gestión de Vacunación</h3>
                        <p class="text-sm text-black">
                            Ur'vaccine está comprometido con la mejora de la eficiencia en la gestión de vacunación en Colombia, ofreciendo una solución digital innovadora que simplifica el proceso de registro y seguimiento de esquemas de vacunación. Nuestra plataforma ayuda a optimizar los recursos y a garantizar que cada ciudadano y mascota reciba las vacunas necesarias en el momento adecuado.
                        </p>
                        <div class="pt-2">
                            <p class="inline text-xs font-medium mt-0 mr-1 mb-0 ml-0 underline">Personas</p>
                            <p class="inline text-xs font-medium mt-0 mr-1 mb-0 ml-1">· 5 Abril 2024 ·</p>
                            <p class="inline text-xs font-medium text-gray-400 mt-0 mr-1 mb-0 ml-1">Medellín, Antioquia</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                        <img src="{{ asset('images/img6.jpg') }}" class="object-cover w-full mb-2 overflow-hidden rounded-md shadow-md max-h-56 btn-"/>
                        <p class="bg-blue-500 flex items-center leading-none text-sm font-medium text-gray-50 pt-1.5 pr-3 pb-1.5 pl-3
                            rounded-full uppercase">Innovación
                        </p>
                        <h3 class="text-lg font-bold sm:text-xl md:text-2xl">Liderando la Innovación en la Gestión de Vacunación</h3>
                        <p class="text-sm text-black">
                            Ur'vaccine se destaca por su enfoque innovador en la gestión de vacunación, utilizando tecnologías de vanguardia para mejorar la experiencia del usuario y la eficiencia en el proceso de vacunación. Nuestra plataforma incorpora todas las facilidades y funcionalidades para garantizar un seguimiento preciso de los historiales de vacunación.
                        </p>
                        <div class="pt-2">
                            <p class="inline text-xs font-medium mt-0 mr-1 mb-0 ml-0 underline">Mascotas</p>
                            <p class="inline text-xs font-medium mt-0 mr-1 mb-0 ml-1">· 5 Abril 2024 ·</p>
                            <p class="inline text-xs font-medium text-gray-400 mt-0 mr-1 mb-0 ml-1">Medellin, Antioquia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <x-footer />
</x-guest-layout>