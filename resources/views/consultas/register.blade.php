<x-app-layout>
    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md text-center">
        <h1 class="text-2xl font-extrabold">Consulta</h1>
    </div>

    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md">
        @if ($errors->any())
            <div class="container bg-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex justify-center">
            <form action="{{ route('consultas.store') }}" method="POST" class="w-full">
                @csrf
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div class="mb-3 text-gray-500">
                        <!-- Columna uno -->
                        <div class="form-group flex flex-col mt-3">
                            <label for="id_paciente" class="block mb-2 text-sm font-medium text-gray-900">Paciente de la
                                cita:</label>
                            <input type="text" id="nombre_paciente" value="{{ $paciente->nombre }}">
                            <input type="hidden" id="id_paciente" name="id_paciente" value="{{ $paciente->id }}">
                        </div>
                        <div class="form-group flex flex-col mt-3">
                            <label for="temperatura_actual"
                                class="block mb-2 text-sm font-medium text-gray-900">Temperatura
                                actual:</label>
                            <input type="text" id="temperatura_actual" name="temperatura_actual" class="form-control"
                                placeholder="Ingrese la temperatura actual del paciente">
                        </div>
                        <div class="form-group flex flex-col mt-3">
                            <label for="presion_arterial" class="block mb-2 text-sm font-medium text-gray-900">Presion
                                arterial:</label>
                            <input type="text" id="presion_arterial" name="presion_arterial"
                                placeholder="Ingrese su presion arterial" class="form-control">
                        </div>

                        <div class="form-group flex flex-col mt-3">
                            <label for="diagnostico"
                                class="block mb-2 text-sm font-medium text-gray-900">Diagnostico:</label>
                            <textarea name="diagnostico" id="diagnostico" cols="50" rows="5" maxlength="255"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 text-gray-500">
                        <!-- Columna uno -->
                        <div class="form-group flex flex-col">
                            <div class="flex justify-between">
                                <label for="servicios"
                                class="block mb-2 text-sm font-medium text-gray-900">Servicios:</label>
                                <a href="#"><img src="{{ asset('img/icon_add.png') }}" width="30px" alt=""></a>
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
                                <a href="#"><img src="{{ asset('img/icon_add.png') }}" width="30px" alt=""></a>
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
                                <a href="#"><img src="{{ asset('img/icon_add.png') }}" width="30px" alt=""></a>
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
                </div>
                <div class="mt-3 flex sm:justify-end justify-center">
                    <button type="submit"
                        class="text-black font-bold bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] rounded-lg px-5 py-2.5 me-2 mb-2 focus:outline-none">Aceptar</button>
                    <a href="{{ route('agenda') }}"
                        class="text-black font-bold bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] rounded-lg px-5 py-2.5 me-2 mb-2 focus:outline-none">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    @push('scripts')
        <script>
            function regresar(event) {
                event.preventDefault();
                window.history.back();
            }
        </script>
    @endpush
</x-app-layout>
