<x-app-layout>
    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md text-center">
        <h1 class="text-2xl font-extrabold">Registrar nueva venta</h1>
    </div>

    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md">
        @if ($errors->any())
            <div class="container bg-red-400">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex justify-center">
            <form action="ventas.store" method="POST" class="w-full sm:w-1/2">
                @csrf
                <div class="mb-3 text-gray-500">
                    <!-- Columna uno -->
                    <div class="form-group flex flex-col">
                        <div class="flex justify-between">
                            <label for="servicios"
                                class="block mb-2 text-sm font-medium text-gray-900">Servicios:</label>
                            <button class="flex" type="button" id="openModalServicio"><img
                                    src="{{ asset('img/icon_add.png') }}" width="30px" alt="">agregar</button>
                        </div>
                        <div class="overflow-auto h-28">
                            <div class="flex mb-1">
                                <input type="text" id="temperatura_actual" name="temperatura_actual"
                                    class="form-control mr-1" placeholder="Ingrese la temperatura actual del paciente">
                                <input type="text" id="temperatura_actual" name="temperatura_actual"
                                    class="form-control" placeholder="Ingrese la temperatura actual del paciente">
                            </div>
                        </div>
                    </div>
                    <div class="form-group flex flex-col mt-3">
                        <div class="flex justify-between">
                            <label for="servicios"
                                class="block mb-2 text-sm font-medium text-gray-900">Productos:</label>
                            <button class="flex" type="button" id="openModalProducto"><img
                                    src="{{ asset('img/icon_add.png') }}" width="30px" alt="">agregar</button>
                        </div>
                        <div class="overflow-auto h-28">
                            <div class="flex mb-1">
                                <input type="text" id="temperatura_actual" name="temperatura_actual"
                                    class="form-control mr-1" placeholder="Ingrese la temperatura actual del paciente">
                                <input type="text" id="temperatura_actual" name="temperatura_actual"
                                    class="form-control" placeholder="Ingrese la temperatura actual del paciente">
                            </div>
                        </div>
                    </div>
                    <div class="form-group flex flex-col mt-3">
                        <div class="flex justify-between">
                            <label for="servicios"
                                class="block mb-2 text-sm font-medium text-gray-900">Estudios:</label>
                            <button class="flex" type="button" id="openModalEstudio"><img
                                    src="{{ asset('img/icon_add.png') }}" width="30px" alt="">agregar</button>
                        </div>
                        <div class="overflow-auto h-28">
                            <div class="flex mb-1">
                                <input type="text" id="temperatura_actual" name="temperatura_actual"
                                    class="form-control mr-1" placeholder="Ingrese la temperatura actual del paciente">
                                <input type="text" id="temperatura_actual" name="temperatura_actual"
                                    class="form-control" placeholder="Ingrese la temperatura actual del paciente">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center mt-3">
                    <a href="{{ route('productos.index') }}"
                        class="text-black bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Cancelar</a>
                    <button type="submit"
                        class="text-black bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Aceptar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Structure Servicio -->
    <div id="myModalServicio" class="modal hidden fixed w-full h-full top-0 left-0 items-center justify-center z-50">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-80"></div>
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <!-- Modal Content -->
            <div class="modal-content py-4 text-left px-6">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Agregar servicio
                    </h3>
                    <button type="button" id="closeModalServicioBtn"
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
                <form class="p-4 md:p-5" action="" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="form-group flex flex-col mt-3">
                            <label for="id_medico" class="block mb-2 text-sm font-medium text-gray-900">Elige servicio:</label>
                            <select name="id_medico" id="id_medico"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--</option>
                                @foreach ($servicios as $servicio)
                                    <option value="{{ $servicio->id }}"> {{ $servicio->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit"
                        class="bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] inline-flex items-center focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Añadir servicio
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Structure Productos -->
    <div id="myModalProducto" class="modal hidden fixed w-full h-full top-0 left-0 items-center justify-center z-50">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-80"></div>
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <!-- Modal Content -->
            <div class="modal-content py-4 text-left px-6">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Agregar producto
                    </h3>
                    <button type="button" id="closeModalProductoBtn"
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
                <form class="p-4 md:p-5" action="" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="form-group flex flex-col mt-3">
                            <label for="id_medico" class="block mb-2 text-sm font-medium text-gray-900">Elige el producto:</label>
                            <select name="id_medico" id="id_medico"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--</option>
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}"> {{ $producto->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit"
                        class="bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] inline-flex items-center focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Añadir producto
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Structure Estudios -->
    <div id="myModalEstudio" class="modal hidden fixed w-full h-full top-0 left-0 items-center justify-center z-50">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-80"></div>
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <!-- Modal Content -->
            <div class="modal-content py-4 text-left px-6">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Agregar estudio
                    </h3>
                    <button type="button" id="closeModalEstudioBtn"
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
                <form class="p-4 md:p-5" action="" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="form-group flex flex-col mt-3">
                            <label for="id_medico" class="block mb-2 text-sm font-medium text-gray-900">Elige el
                                medico
                                a cargo:</label>
                            <select name="id_medico" id="id_medico"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--</option>
                                @foreach ($servicios as $servicio)
                                    <option value="{{ $servicio->id }}"> {{ $servicio->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit"
                        class="bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] inline-flex items-center focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Añadir servicio
                    </button>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function regresar(event) {
                event.preventDefault();
                window.history.back();
            }

            document.addEventListener('DOMContentLoaded', function() {
                const openModalServicioBtn = document.getElementById('openModalServicio');
                const openModalProductoBtn = document.getElementById('openModalProducto');
                const openModalEstudioBtn = document.getElementById('openModalEstudio');

                const closeModalServicioBtn = document.getElementById('closeModalServicioBtn');
                const closeModalProductoBtn = document.getElementById('closeModalProductoBtn');
                const closeModalEStudioBtn = document.getElementById('closeModalEstudioBtn');

                const modalServicio = document.getElementById('myModalServicio');
                const modalProducto = document.getElementById('myModalProducto');
                const modalEstudio = document.getElementById('myModalEstudio');

                openModalServicioBtn.addEventListener('click', function() {
                    modalServicio.classList.remove('hidden');
                    modalServicio.classList.add('flex');
                });

                openModalProductoBtn.addEventListener('click', function() {
                    modalProducto.classList.remove('hidden');
                    modalProducto.classList.add('flex');
                });

                openModalEstudioBtn.addEventListener('click', function() {
                    modalEstudio.classList.remove('hidden');
                    modalEstudio.classList.add('flex');
                });

                closeModalServicioBtn.addEventListener('click', function() {
                    modalServicio.classList.add('hidden');
                });

                closeModalProductoBtn.addEventListener('click', function() {
                    modalProducto.classList.add('hidden');
                });

                closeModalEstudioBtn.addEventListener('click', function() {
                    modalEstudio.classList.add('hidden');
                });
            });
        </script>
    @endpush
</x-app-layout>
