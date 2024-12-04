<div class=" bg-gray-100 py-7 px-7">
    <div class="ml-60">
        <a href="/"
            class="inline-flex items-center justify-center bg-white hover:bg-gray-100 py-2 px-5
                    rounded-md text-black text-xs font-extrabold uppercase text-center gap-1 shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" class="w-7 h-7">
                <path fill-rule="evenodd" d="M7.28 7.72a.75.75 0 0 1 0 1.06l-2.47 2.47H21a.75.75 0 0 1 0 1.5H4.81l2.47 2.47a.75.75 0 1 1-1.06 1.06l-3.75-3.75a.75.75 0 0 1 0-1.06l3.75-3.75a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
            </svg>
            Volver
        </a>
    </div>
    <a href="/">
        <x-application-logo />
    </a>

    <div class="p-6 flex justify-center">
        <div class="p-8 bg-white rounded-lg shadow-xl max-w-3xl w-full">
            <x-guest-layout>
                <div class="flex flex-col items-center">
                    <h1 class="text-center text-blue-700 text-4xl font-bold">Crea una cuenta</h1>
                    <h2 class="text-center text-blue-700 text-xl mt-2">¡Llena el formulario!</h2>
                </div>
                <form method="POST" action="{{ route('register') }}" class="mx-auto mt-5 max-w-xl md:mt-8" novalidate>
                    @csrf

                    <div class="border-b border-gray-300 mt-4 mb-6"></div>

                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 md:grid-cols-2">

                        <!-- Role -->
                        <div class="md:col-span-2" hidden>
                            <x-input-label for="rol" :value="__('Cuenta')" />
                            <select
                                name="rol"
                                id="rol"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600">
                                <option value="" disabled>Usuario</option>
                                <option value="1" selected>Persona</option>
                                <!-- <option value="2">Mascota</option> -->
                            </select>

                            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
                        </div>

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Primer Nombre')" />

                            <x-text-input
                                id="name"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="text"
                                name="name"
                                :value="old('name')"
                                required autofocus autocomplete="name"
                                placeholder="Primer Nombre" />

                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- segundo nombre -->
                        <div>
                            <x-input-label for="segundoNombre" :value="__('Segundo Nombre')" />

                            <x-text-input
                                id="segundoNombre"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="text"
                                name="segundoNombre"
                                :value="old('segundoNombre')"
                                required autofocus autocomplete="segundoNombre"
                                placeholder="Segundo Nombre" />

                            <x-input-error :messages="$errors->get('segundoNombre')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="apellido" :value="__('Primer Apellido')" />

                            <x-text-input
                                id="apellido"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="text"
                                name="apellido"
                                :value="old('apellido')"
                                required autofocus autocomplete="apellido"
                                placeholder="Primer Apellido" />

                            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                        </div>

                        <!-- segundo apellido -->
                        <div>
                            <x-input-label for="segundoApellido" :value="__('Segundo Apellido')" />

                            <x-text-input
                                id="segundoApellido"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="text"
                                name="segundoApellido"
                                :value="old('segundoApellido')"
                                required autofocus autocomplete="segundoApellido"
                                placeholder="Segundo Apellido" />

                            <x-input-error :messages="$errors->get('segundoApellido')" class="mt-2" />
                        </div>
                        <!-- modificacion -->



                        <!-- tipo_doc -->
                        <div>
                            <x-input-label for="tipo_doc" :value="__('Seleccion su tipo de documento')" />
                            <select
                                name="tipo_doc"
                                id="tipo_doc"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600">
                                <option value="" selected disabled>--Tipo de documento--</option>
                                <option value="CC">Cedula De Ciudadania</option>
                                <option value="TI">Tarjeta De Identidad</option>
                                <option value="CE">Cedula De Extranjeria</option>
                                <option value="RC">Registro Civil</option>
                                <option value="PA">Pasaporte</option>
                            </select>

                            <x-input-error :messages="$errors->get('tipo_doc')" class="mt-2" />
                        </div>

                        <!-- documento -->
                        <div>
                            <x-input-label for="documento" :value="__('Documento #')" />

                            <x-text-input
                                id="documento"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                                ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                                focus:ring-inset focus:ring-blue-600"
                                type="text"
                                name="documento"
                                :value="old('documento')"
                                required autofocus autocomplete="documento"
                                placeholder="Documento" />

                            <x-input-error :messages="$errors->get('documento')" class="mt-2" />
                        </div>

                        <!-- genero -->
                        <div>
                            <x-input-label for="genero" :value="__('Genero')" />

                            <select
                                name="genero"
                                id="genero"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600">
                                <option selected value="" disabled>--Seleccione su genero--</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                            </select>

                            <x-input-error :messages="$errors->get('genero')" class="mt-2" />
                        </div>

                        <!-- horientacion sexual -->
                        <div>
                            <x-input-label for="orientacionSexual" :value="__('Orientacion Sexual')" />

                            <!-- Desplegable de países -->
                            <select
                                name="paisSelect"
                                id="orientacionSexual"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                                  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                                  focus:ring-inset focus:ring-blue-600">
                                <option selected value="" disabled>--Seleccione su orientacion--</option>
                                <option value="heterosexual">Heterosexual</option>
                                <option value="homosexual">Homosexual</option>
                                <option value="bisexual">Bisexual</option>
                                <option value="pansexual">Pansexual</option>
                                <option value="otro">Otro</option>

                            </select>

                            <!-- Campo de texto personalizado -->
                            <input
                                type="text"
                                id="customCountry"
                                name="custom"
                                class="block w-full mt-2 hidden rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                                ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                                focus:ring-inset focus:ring-blue-600"
                                placeholder="Orientacion Sexual..." />

                            <!-- Campo oculto para enviar el valor final -->
                            <input type="hidden" name="orientacionSexual" id="orientacionSexualFinal" />

                            <x-input-error :messages="$errors->get('orientacionSexual')" class="mt-2" />
                        </div>

                        <script>
                            document.getElementById('orientacionSexual').addEventListener('change', function() {
                                const customCountry = document.getElementById('customCountry');
                                const orientacionSexualFinal = document.getElementById('orientacionSexualFinal');

                                if (this.value === 'otro') {
                                    customCountry.classList.remove('hidden');
                                    customCountry.setAttribute('required', true);
                                    orientacionSexualFinal.value = ''; // Limpiar el valor del campo oculto mientras se llena el campo personalizado
                                } else {
                                    customCountry.classList.add('hidden');
                                    customCountry.removeAttribute('required');
                                    orientacionSexualFinal.value = this.value; // Guardar el valor del país seleccionado en el campo oculto
                                    customCountry.value = ''; // Limpiar el campo personalizado si se selecciona un país
                                }
                            });

                            document.getElementById('customCountry').addEventListener('input', function() {
                                const orientacionSexualFinal = document.getElementById('orientacionSexualFinal');
                                orientacionSexualFinal.value = this.value; // Actualizar el campo oculto con el valor ingresado
                            });
                        </script>

                    </div>
                    <br />
                    <!-- datos seguro -->
                    <h2 class="text-center text-blue-700 text-2xl font-bold">Datos De Nacimiento</h2>
                    </br>
                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 md:grid-cols-2">

                        <!-- nacimiento -->
                        <div>
                            <x-input-label for="nacimiento" :value="__('Fecha de nacimiento')" />

                            <x-text-input
                                id="nacimiento"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="date"
                                name="nacimiento"
                                :value="old('nacimiento')"
                                required autofocus autocomplete="nacimiento"
                                max="{{ date('Y-m-d') }}"
                                onchange="calcularEdad()" />

                            <x-input-error :messages="$errors->get('nacimiento')" class="mt-2" />
                        </div>
                        <!-- edad -->
                        <div>
                            <x-input-label for="edad" :value="__('Edad')" />

                            <x-text-input
                                id="edad"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="number"
                                name="edad"
                                :value="old('edad')"
                                required autofocus autocomplete="edad"
                                placeholder="Edad"
                                readonly />

                            <x-input-error :messages="$errors->get('edad')" class="mt-2" />
                        </div>
                        <!-- calcular edad -->
                        <script>
                            function calcularEdad() {
                                // Obtener la fecha de nacimiento del input
                                var fechaNacimiento = document.getElementById("nacimiento").value;

                                if (fechaNacimiento) {
                                    // Convertir la fecha de nacimiento en un objeto Date
                                    var nacimiento = new Date(fechaNacimiento);

                                    // Obtener la fecha actual
                                    var fechaActual = new Date();

                                    // Calcular la diferencia de años
                                    var edad = fechaActual.getFullYear() - nacimiento.getFullYear();
                                    var mes = fechaActual.getMonth() - nacimiento.getMonth();

                                    // Si el mes actual es antes del mes de nacimiento, restamos 1 año
                                    if (mes < 0 || (mes === 0 && fechaActual.getDate() < nacimiento.getDate())) {
                                        edad--;
                                    }

                                    // Colocar la edad calculada en el campo de "edad"
                                    document.getElementById("edad").value = edad;
                                } else {
                                    // Si no hay fecha de nacimiento, limpiar el campo de edad
                                    document.getElementById("edad").value = '';
                                }
                            }
                        </script>

                        <!-- pais -->
                        <div>
                            <x-input-label for="pais" :value="__('Pais')" />

                            <x-text-input
                                id="pais"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="text"
                                name="pais"
                                :value="old('pais')"
                                required autofocus autocomplete="pais"
                                placeholder="Pais" />

                            <x-input-error :messages="$errors->get('pais')" class="mt-2" />
                        </div>

                        <!-- departamento -->
                        <div>
                            <x-input-label for="departamento" :value="__('Departamento')" />

                            <x-text-input
                                id="departamento"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="text"
                                name="departamento"
                                :value="old('departamento')"
                                required autofocus autocomplete="departamento"
                                placeholder="Departamento" />

                            <x-input-error :messages="$errors->get('departamento')" class="mt-2" />
                        </div>


                        <!-- municipio  -->
                        <div>
                            <x-input-label for="municipio" :value="__('Municipio')" />

                            <x-text-input
                                id="municipio"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="text"
                                name="municipio"
                                :value="old('municipio')"
                                required autofocus autocomplete="municipio"
                                placeholder="Municipio" />

                            <x-input-error :messages="$errors->get('municipio')" class="mt-2" />
                        </div>
                    </div>
                    <br />
                    <!-- datos seguro -->
                    <h2 class="text-center text-blue-700 text-2xl font-bold">Seguridad Social</h2>
                    </br>
                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 md:grid-cols-2">

                        <!-- regimen -->
                        <div>
                            <x-input-label for="regimenAfiliacion" :value="__('Regimen De Afiliacion')" />

                            <select
                                name="regimenAfiliacion"
                                id="regimenAfiliacion"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600">
                                <option selected value="" disabled>--Seleccione Regimen--</option>
                                <option value="contributivo">Contributivo</option>
                                <option value="Subsidiado">Subsidiado</option>
                                <option value="Otro">Otro</option>
                            </select>

                            <x-input-error :messages="$errors->get('regimenAfiliacion')" class="mt-2" />
                        </div>
                        <!-- eps -->
                        <div>
                            <x-input-label for="eps" :value="__('EPS')" />

                            <x-text-input
                                id="eps"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="text"
                                name="eps"
                                :value="old('eps')"
                                required autofocus autocomplete="eps"
                                placeholder="EPS" />

                            <x-input-error :messages="$errors->get('eps')" class="mt-2" />
                        </div>


                    </div>
                    </br>
                    <!-- datos complentarios -->

                    <h2 class="text-center text-blue-700 text-2xl font-bold">Datos Complementarios</h2>
                    </br>
                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 md:grid-cols-2">

                        <div>
                            <x-input-label for="etnia" :value="__('Etnia')" />

                            <x-text-input
                                id="etnia"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="text"
                                name="etnia"
                                :value="old('etnia')"
                                required autofocus autocomplete="etnia"
                                placeholder="Etnia" />

                            <x-input-error :messages="$errors->get('etnia')" class="mt-2" />
                        </div>
                        <!--desplazado  -->
                        <div>
                            <x-input-label for="desplazado" :value="__('Desplazado')" />

                            <select
                                name="desplazado"
                                id="desplazado"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600">
                                <option selected value="" disabled>--Seleccione--</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>

                            </select>

                            <x-input-error :messages="$errors->get('desplazado')" class="mt-2" />
                        </div>

                        <!-- discapacidad -->

                        <div>
                            <x-input-label for="discapacidad" :value="__('Discapacidad')" />
                            <select
                                name="discapacidad"
                                id="discapacidad"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                                   focus:ring-inset focus:ring-blue-600"
                                onchange="toggleDescripcionDiscapacidad()">
                                <option selected value="" disabled>--Seleccione--</option>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>

                            <x-input-error :messages="$errors->get('discapacidad')" class="mt-2" />
                        </div>

                        <!-- descripcion discapacidad -->
                        <div id="descripcionDiscapacidadContainer" style="display: none;">
                            <x-input-label for="descripcionDiscapacidad" :value="__('Descripcion discapacidad')" />
                            <x-text-input
                                id="descripcionDiscapacidad"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                                            focus:ring-inset focus:ring-blue-600"
                                type="text"
                                name="descripcionDiscapacidad"
                                :value="old('descripcionDiscapacidad')"
                                placeholder="Descripción de la discapacidad" />

                            <x-input-error :messages="$errors->get('descripcionDiscapacidad')" class="mt-2" />
                        </div>

                        <!-- JavaScript para mostrar/ocultar el campo -->
                        <script>
                            function toggleDescripcionDiscapacidad() {
                                const select = document.getElementById('discapacidad');
                                const descripcionContainer = document.getElementById('descripcionDiscapacidadContainer');

                                // Verifica el valor seleccionado y muestra/oculta el campo de descripción
                                if (select.value === 'si') {
                                    descripcionContainer.style.display = 'block'; // Muestra el campo
                                } else {
                                    descripcionContainer.style.display = 'none'; // Oculta el campo
                                }
                            }

                            // Ejecuta la función cuando la página se carga para verificar el valor seleccionado
                            document.addEventListener('DOMContentLoaded', function() {
                                toggleDescripcionDiscapacidad();
                            });
                        </script>

                        <!-- victima conflicto -->
                        <div>
                            <x-input-label for="victimaConflicto" :value="__('Victima Del Conflicto Armado')" />

                            <select
                                name="victimaConflicto"
                                id="victimaConflicto"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600">
                                <option selected value="" disabled>--Seleccione--</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>

                            </select>

                            <x-input-error :messages="$errors->get('victimaConflicto')" class="mt-2" />
                        </div>

                        <!-- estudiante -->

                        <div>
                            <x-input-label for="estudiante" :value="__('Estudiante')" />

                            <select
                                name="estudiante"
                                id="estudiante"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600" onchange="toggleDescripcionEstudiante()">
                                <option selected value="" disabled>--Seleccione--</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>

                            </select>

                            <x-input-error :messages="$errors->get('estudiante')" class="mt-2" />
                        </div>

                        <!-- descripcion estudio -->
                        <div id="descripcionEstudianteContainer" style="display: none;">
                            <x-input-label for="descripcionEstudiante" :value="__('Descripcion Estudio')" />
                            <x-text-input
                                id="descripcionEstudiante"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                                   ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                                         focus:ring-inset focus:ring-blue-600"
                                type="text"
                                name="descripcionEstudiante"
                                :value="old('descripcionEstudiante')"
                                placeholder="Descripción del Estudio" />

                            <x-input-error :messages="$errors->get('descripcionEstudiante')" class="mt-2" />
                        </div>

                        <!-- JavaScript para mostrar/ocultar el campo -->
                        <script>
                            function toggleDescripcionEstudiante() {
                                const select = document.getElementById('estudiante');
                                const descripcionContainer = document.getElementById('descripcionEstudianteContainer');

                                // Verifica el valor seleccionado y muestra/oculta el campo de descripción
                                if (select.value === 'si') {
                                    descripcionContainer.style.display = 'block'; // Muestra el campo
                                } else {
                                    descripcionContainer.style.display = 'none'; // Oculta el campo
                                }
                            }

                            // Ejecuta la función cuando la página se carga para verificar el valor seleccionado
                            document.addEventListener('DOMContentLoaded', function() {
                                toggleDescripcionEstudiante();
                            });
                        </script>


                    </div>
                    <!-- datos residenciales -->
                    </br>
                    <h1 class="text-center text-blue-700 text-2xl font-bold">Datos De Residencia</h1>
                    <br />
                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 md:grid-cols-2">


                        <!-- pais -->
                        <div>
                            <x-input-label for="paisResidencia" :value="__('Pais De Residencia')" />

                            <x-text-input
                                id="paisResidencia"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="text"
                                name="paisResidencia"
                                :value="old('paisResidencia')"
                                required autofocus autocomplete="paisResidencia"
                                placeholder="Pais Residencia" />

                            <x-input-error :messages="$errors->get('paisResidencia')" class="mt-2" />
                        </div>



                        <!-- departamento -->
                        <div>
                            <x-input-label for="departamentoResidencia" :value="__('Departamento De Residencia')" />

                            <x-text-input
                                id="departamentoResidencia"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="text"
                                name="departamentoResidencia"
                                :value="old('departamentoResidencia')"
                                required autofocus autocomplete="departamentoResidencia"
                                placeholder="Departamento Residencia" />

                            <x-input-error :messages="$errors->get('departamentoResidencia')" class="mt-2" />
                        </div>

                        <!-- municipio  -->
                        <div>
                            <x-input-label for="municipioResidencia" :value="__('Municipio De Residencia')" />

                            <x-text-input
                                id="municipioResidencia"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="text"
                                name="municipioResidencia"
                                :value="old('municipioResidencia')"
                                required autofocus autocomplete="municipioResidencia"
                                placeholder="Municipio Residencia" />

                            <x-input-error :messages="$errors->get('municipioResidencia')" class="mt-2" />
                        </div>

                        <!-- comuna -->
                        <div>
                            <x-input-label for="comuna" :value="__('Comuna')" />

                            <x-text-input
                                id="comuna"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="text"
                                name="comuna"
                                :value="old('comuna')"
                                required autofocus autocomplete="comuna"
                                placeholder="Comuna" />

                            <x-input-error :messages="$errors->get('comuna')" class="mt-2" />
                        </div>
                        <!-- barrio -->
                        <div>
                            <x-input-label for="barrio" :value="__('Barrio')" />

                            <x-text-input
                                id="barrio"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="text"
                                name="barrio"
                                :value="old('barrio')"
                                required autofocus autocomplete="barrio"
                                placeholder="Barrio" />

                            <x-input-error :messages="$errors->get('barrio')" class="mt-2" />
                        </div>
                        <!-- area -->
                        <div>
                            <x-input-label for="area" :value="__('Area')" />

                            <select
                                name="area"
                                id="area"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600">
                                <option selected value="" disabled>--Seleccione Area--</option>
                                <option value="rural">Rural</option>
                                <option value="urbana">Urbana</option>

                            </select>

                            <x-input-error :messages="$errors->get('area')" class="mt-2" />
                        </div>
                        <!-- direccion -->
                        <div class="md:col-span-2">
                            <x-input-label for="direccion" :value="__('Direccion')" />

                            <x-text-input
                                id="direccion"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="text"
                                name="direccion"
                                :value="old('direccion')"
                                required autofocus autocomplete="direccion"
                                placeholder="Direccion" />

                            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
                        </div>

                        <!-- celular -->
                        <div class="md:col-span-2">
                            <x-input-label for="celular" :value="__('Celular')" />

                            <x-text-input
                                id="celular"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="tel"
                                name="celular"
                                :value="old('celular')"
                                required autofocus autocomplete="celular"
                                placeholder="Celular" />

                            <x-input-error :messages="$errors->get('celular')" class="mt-2" />
                        </div>


                        <!-- telefono -->
                        <div class="md:col-span-2">
                            <x-input-label for="telefono" :value="__('Telefono')" />

                            <x-text-input
                                id="telefono"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600"
                                type="tel"
                                name="telefono"
                                :value="old('telefono')"
                                required autofocus autocomplete="telefono"
                                placeholder="Telefono" />

                            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                        </div>
                        <!-- autoriza -->
                        <div>
                            <x-input-label for="autoriza" :value="__('Autoriza el tratamiento de datos y envio de informacion')" />

                            <select
                                name="autoriza"
                                id="autoriza"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                            focus:ring-inset focus:ring-blue-600">
                                <option selected value="" disabled>--Seleccione--</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>

                            </select>

                            <x-input-error :messages="$errors->get('autoriza')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="md:col-span-2">
                            <x-input-label for="email" :value="__('Correo electronico')" />

                            <x-text-input
                                id="email"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                        ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                        focus:ring-inset focus:ring-blue-600"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required autofocus autocomplete="email"
                                placeholder="Correo electronico" />

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="md:col-span-2">
                            <x-input-label for="password" :value="__('Contraseña')" />

                            <x-text-input
                                id="password"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                        ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                        focus:ring-inset focus:ring-blue-600"
                                type="password"
                                name="password"
                                :value="old('password')"
                                required autofocus autocomplete="password"
                                placeholder="Contraseña" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Password_confirmation -->
                        <div class="md:col-span-2">
                            <x-input-label for="password_confirmation" :value="__('Repita su contraseña')" />

                            <x-text-input
                                id="password_confirmation"
                                class="block w-full mt-1 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-md 
                        ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 
                        focus:ring-inset focus:ring-blue-600"
                                type="password"
                                name="password_confirmation"
                                :value="old('password_confirmation')"
                                required autofocus autocomplete="password_confirmation"
                                placeholder="Repita su contraseña" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                    </div>

                    <div class="border-b border-gray-300 mt-6 mb-4"></div>

                    <x-primary-button class=" block w-full rounded-md bg-green-600 py-2 px-4 text-center hover:bg-green-700 text-white font-bold">
                        {{ __('Crear cuenta') }}
                    </x-primary-button>

                    <div class="flex justify-center mt-5">
                        <x-link
                            :href="route('login')"
                            class="text-blue-600  mb-5 hover:underline hover:text-blue-800">
                            ¿Ya tienes una cuenta? Inicia sesion
                        </x-link>
                    </div>

                </form>
            </x-guest-layout>
        </div>
    </div>
</div>