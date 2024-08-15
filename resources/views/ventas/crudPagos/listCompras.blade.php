<x-app-layout>
    <div
        class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md flex flex-col items-center sm:justify-between sm:flex-row">
        <h1 class="text-4xl font-extrabold mb-2 text-center sm:mb-0">Ventas</h1>
        <a href="{{ route('pacientes.create') }}"
            class= "bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium px-2 py-2.5 sm:px-5 me-2 mb-2 focus:outline-none text-center">Nueva
            venta</a>
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
                            Nombre del paciente
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tipo de compra
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $compra)
                        <tr class="bg-white">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $compra->paciente()->nombre }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $compra->tipoPago }}
                            </td>
                            <td class="px-6 py-4 flex">
                                <a href="{{ route('ventas.show', $compra->id) }}"
                                    class="font-semibold text-lg hover:bg-green-100 text-blue-600 hover:underline py-1 px-2 border border-blue-500 rounded-lg mr-1"><i
                                        class="fa-regular fa-eye"></i></a>
                                <a href="{{ route('ventas.edit', $compra->id) }}"
                                    class="font-medium text-lg text-blue-600 hover:bg-green-100 hover:underline py-1 px-2 border border-blue-500 rounded-lg mr-1"><i
                                        class="fa-regular fa-pen-to-square"></i></a>
                                <form action="{{ route('ventas.destroy', $compra->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Quieres eliminar este paciente?');"
                                        class="font-medium text-lg text-blue-600 hover:bg-green-100 hover:underline py-1 px-2 border border-blue-500 rounded-lg mr-1"><i
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