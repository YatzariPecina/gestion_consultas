<x-app-layout>
    <div
        class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md flex flex-col items-center sm:justify-between sm:flex-row">
        <h1 class="text-4xl font-extrabold mb-2 text-center sm:mb-0">Pacientes</h1>
        @if ($numMedicos > 0)
            <a href="{{ route('pacientes.create') }}"
                class= "bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium px-2 py-2.5 sm:px-5 me-2 mb-2 focus:outline-none text-center">Añadir
                paciente</a>
        @else
            <p class="font-semibold">No se puede registrar pacientes porque no hay medicos</p>
        @endif
    </div>

    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md">
        <div class="my-4">
            @session('success')
                <div class="alert alert-success" role="alert">
                    {{ $value }}
                </div>
            @endsession
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-900 uppercase bg-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Numero de paciente
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre del paciente
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Medico a cargo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pacientes as $paciente)
                        <tr class="bg-white">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $paciente->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $paciente->nombre }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $paciente->medico->nombre }}
                            </td>
                            <td class="px-6 py-4 flex">
                                <a href="{{ route('pacientes.show', $paciente->id) }}"
                                    class="font-semibold text-lg hover:bg-green-100 text-blue-600 hover:underline py-1 px-2 border border-blue-500 rounded-lg mr-1"><i
                                        class="fa-regular fa-eye"></i></a>
                                <a href="{{ route('pacientes.edit', $paciente->id) }}"
                                    class="font-medium text-lg text-blue-600 hover:bg-green-100 hover:underline py-1 px-2 border border-blue-500 rounded-lg mr-1"><i
                                        class="fa-regular fa-pen-to-square"></i></a>
                                <a href="{{ route('citas.create') }}"
                                    class="font-medium text-lg text-blue-600 hover:bg-green-100 hover:underline py-1 px-2 border border-blue-500 rounded-lg mr-1"><i
                                        class="fa-regular fa-calendar-plus"></i></a>
                                <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="font-medium text-lg text-blue-600 hover:bg-green-100 hover:underline py-1 px-2 border border-blue-500 rounded-lg"><i
                                            class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
