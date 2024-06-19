<x-app-layout>
    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md flex justify-between items-center">
        <h1 class="text-4xl font-extrabold">Medicos</h1>
        <a href="{{ route('medicos.create') }}"
            class= "bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium px-5 py-2.5 me-2 mb-2 focus:outline-none">Añadir
            medico</a>
    </div>

    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-900 uppercase bg-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rol
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicos as $medico)
                        <tr class="bg-white">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $medico->nombre }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $medico->profesion }}
                            </td>
                            <td class="px-6 py-4 flex flex-wrap">
                                <a href="{{ route('medicos.show', $medico->id) }}"
                                    class="font-medium text-blue-600 hover:underline pr-2">Ver</a>
                                <a href="{{ route('medicos.edit', $medico->id) }}"
                                    class="font-medium text-blue-600 hover:underline pr-2">Editar</a>
                                <form action="{{ route('medicos.destroy', $medico->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="font-medium text-blue-600 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
