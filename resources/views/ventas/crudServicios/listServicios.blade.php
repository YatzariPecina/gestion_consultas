<x-app-layout>
    <div
        class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md flex flex-col items-center sm:justify-between sm:flex-row">
        <h1 class="text-4xl font-extrabold mb-2 text-center sm:mb-0">Servicios</h1>
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
        <div class="flex">
            <a href="{{ route('servicios.create') }}"
                class= "bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium px-2 py-2.5 sm:px-5 me-2 mb-2 focus:outline-none text-center">Nuevo
                servicio</a>
            <button id="openModalBtn" type="button"
                class= "bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium px-2 py-2.5 sm:px-5 me-2 mb-2 focus:outline-none text-center">Nuevo
                tipo de servicio</button>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-900 uppercase bg-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Precio
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tipo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($servicios as $servicio)
                        <tr class="bg-white">
                            <th scope="row" class="px-6 py-4">
                                {{ $servicio->nombre }}
                            </th>
                            <td class="px-6 py-4">
                                ${{ $servicio->precio }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $servicio->tipoServicio->tipo }}
                            </td>
                            <td class="px-6 py-4 flex flex-wrap">
                                <a href="{{ route('medicos.show', $servicio->id) }}"
                                    class="font-medium text-blue-600 hover:underline py-1 px-2 border border-blue-500 rounded-lg mr-1"><i
                                        class="fa-regular fa-eye"></i></a>
                                <a href="{{ route('medicos.edit', $servicio->id) }}"
                                    class="font-medium text-blue-600 hover:underline py-1 px-2 border border-blue-500 rounded-lg mr-1"><i
                                        class="fa-regular fa-pen-to-square"></i></a>
                                <form action="{{ route('medicos.destroy', $servicio->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Quieres eliminar este servicio?');"
                                        class="font-medium text-blue-600 hover:underline py-1 px-2 border border-blue-500 rounded-lg mr-1"><i
                                            class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="6">
                            <span class="text-danger">
                                <strong>No hay servicios</strong>
                            </span>
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="myModal" class="modal hidden fixed w-full h-full top-0 left-0 items-center justify-center z-50">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-80"></div>
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <!-- Modal Content -->
            <div class="modal-content py-4 text-left px-6">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Crear nuevo tipo de servicio
                    </h3>
                    <button type="button" id="closeModalBtn"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="{{ route('servicios.storeTipoServicio') }}" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Tipo</label>
                            <input type="text" name="tipo" id="tipo"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                placeholder="Tipo de servicio">
                        </div>
                    </div>
                    <button type="submit"
                        class="bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] inline-flex items-center focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Añadir nuevo tipo de servicio
                    </button>
                    </button>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const openModalBtn = document.getElementById('openModalBtn');
                const closeModalBtn = document.getElementById('closeModalBtn');
                const modal = document.getElementById('myModal');

                openModalBtn.addEventListener('click', function() {
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                });

                closeModalBtn.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
        </script>
    @endpush
</x-app-layout>
