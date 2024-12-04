<x-guest-layout>
    <x-nav />
        <div class="my-10 mx-10 bg-white rounded-md shadow-md">  
            <h1 class="text-center py-10 text-4xl text-gray-900 font-bold">Conoce mas sobre Ur'vaccine</h1>
            <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
                <div class="space-y-6 md:space-y-0 md:flex md:gap-6 md:items-center">
                <div class="md:5/12 md:w-5/12 shadow-md rounded-md">
                    <img src="{{ asset('images/persona.jpg') }}" alt="imagen persona">
                </div>
                <div class="md:7/12 md:w-6/12">
                    <h3 class="text-2xl text-gray-900 font-bold">
                        Compromiso de Ur'vaccine
                    </h3>
                    <p class="mt-1 text-gray-600">
                        Ur'vaccine está comprometido con mejorar la eficiencia y la accesibilidad de la gestión de vacunación en Colombia. Nos esforzamos por abordar los desafíos actuales en el sistema de salud colombiano, como la falta de registros centralizados y la dificultad en el seguimiento de esquemas de vacunación, mediante el desarrollo de un aplicativo web innovador y fácil de usar.
                    </p>
                    <h3 class="mt-3 text-2xl text-gray-900 font-bold">
                        Nuestra contribucion a la salud de los colombianos
                    </h3>
                    <p class="mt-1 text-gray-600">
                        Nuestro aplicativo busca contribuir a la mejora de la salud pública en Colombia al facilitar el acceso a la información de vacunación, aumentar la participación en jornadas de vacunación y promover la prevención de enfermedades mediante la vacunación oportuna. Al proporcionar un sistema eficiente y moderno para la gestión de vacunación, esperamos contribuir a la reducción de enfermedades prevenibles y al bienestar general de la población colombiana y sus mascotas.    
                    </p>
                </div>
                </div>
            </div>
            <div class="grid max-w-screen-xl px-6 py-8 mx-auto md:gap-8 xl:gap-0 md:py-16 md:grid-cols-12">
                <div class="mr-auto place-self-center md:col-span-7">
                    <h3 class="text-2xl text-gray-900 font-bold">
                        Mision Ur'vaccine
                    </h3>
                    <p class="mt-1 text-gray-600">
                        Nuestra misión es proporcionar una solución innovadora y eficiente para la gestión digital de los esquemas de vacunación en Colombia, tanto para la población humana como para sus mascotas. Nos esforzamos por facilitar el acceso a la información de vacunación, mejorar la participación en jornadas de vacunación y contribuir al bienestar de la sociedad colombiana mediante un proceso de inscripción digital y un registro preciso de vacunación.    
                    </p>
                    <h3 class="mt-3 text-2xl text-gray-900 font-bold">
                        Vision Ur'vaccine
                    </h3>
                    <p class="mt-1 text-gray-600">
                        Nos visualizamos como líderes en la modernización y optimización del proceso de vacunación en Colombia. Esperamos crear un futuro donde cada ciudadano colombiano y cada mascota tengan acceso fácil y rápido a sus historiales de vacunación, mejorando así la cobertura vacunal y previniendo enfermedades. Buscamos ser reconocidos como un aliado confiable en la promoción de la salud pública y el cuidado de las mascotas en todo el país.    
                    </p>
                </div>
                <div class="md:mt-0 md:col-span-5 md:flex shadow-md rounded-md ml-3">
                    <img src="{{ asset('images/mascota.jpg') }}" alt="imagen mascota">
                </div>                
            </div>
        </div>
    <x-footer />
</x-guest-layout>