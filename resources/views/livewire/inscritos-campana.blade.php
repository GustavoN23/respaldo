<div class="overflow-hidden rounded-lg shadow-md m-5">
    <table class="w-full bg-white text-center">
        <thead class="bg-blue-100">
            <tr>
            <th scope="col" class="px-4 py-4 text-gray-900 border-r border-gray-300">Nombre</th>
            <th scope="col" class="px-4 py-4 text-gray-900 border-r border-gray-300">Documento</th>
            <th scope="col" class="px-4 py-4 text-gray-900 border-r border-gray-300">Nacimiento</th>
            <th scope="col" class="px-4 py-4 text-gray-900 border-r border-gray-300">Genero</th>
            <th scope="col" class="px-4 py-4 text-gray-900 border-r border-gray-300">Inscripción</th>
            <th scope="col" class="px-4 py-4 text-gray-900">Asistencia</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($campana->inscritos as $inscrito)
                <tr class="hover:bg-gray-100 border-t border-gray-300">
                    <td class="flex justify-center py-6 text-gray-900 border-r border-gray-300">
                        <p class="">
                            {{ $inscrito->user->name }}
                            {{ $inscrito->user->apellido }}
                        </p>
                    </td>
                    <td class="py-4 border-r border-gray-300">
                        <p class="">{{ $inscrito->documento }}</p>
                    </td>
                    <td class="py-4 border-r border-gray-300">
                        <p class="">{{ $inscrito->user->nacimiento->toFormattedDateString() }}</p>
                    </td>
                    <td class="py-4 border-r border-gray-300">
                        <p class="uppercase">{{ $inscrito->genero }}</p>
                    </td>
                    <td class="py-4 border-r border-gray-300">
                        <p class="">{{ $inscrito->created_at->diffForhumans() }}</p>
                    </td>
                    <td class="flex justify-center px-5 py-4">
                        <a href="{{ route('inscritos.edit', $inscrito->id) }}"
                            class="bg-green-500 hover:bg-green-600 py-2 px-3 rounded-md shadow-md text-white
                            font-bold"
                        >
                            Asistencia
                        </a>
                    </td>  
                </tr>      
            @empty
                <tr class="md:col-span-4">
                    <td colspan="6" class="p-3 text-center text-gray-600 uppercase">
                        Aun no hay usuarios inscritos a esta jornada de vacunación
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>