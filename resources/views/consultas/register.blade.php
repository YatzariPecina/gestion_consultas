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
                            <label for="id_medico" class="block mb-2 text-sm font-medium text-gray-900">Enfermera
                                asignada:</label>
                            <select name="id_medico" id="id_medico"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="">--</option>
                                @foreach ($enfermeras as $enfermera)
                                    <option value="{{ $enfermera->id }}"> {{ $enfermera->nombreEnfermera }} </option>
                                @endforeach
                            </select>
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
                        <!-- Servicios -->
                        <div class="form-group flex flex-col">
                            <div class="flex justify-between">
                                <label for="servicios"
                                    class="block mb-2 text-sm font-medium text-gray-900">Servicios:</label>
                                <button class="flex" type="button" onclick="añadirProducto()"><img
                                        src="{{ asset('img/icon_add.png') }}" width="30px"
                                        alt="">agregar</button>
                            </div>
                            <div class="overflow-auto h-28">
                                <div class="flex mb-1">
                                    <select name="id_servicio" id="id_servicio"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="">--</option>
                                        @foreach ($servicios as $servicio)
                                            <option value="{{ $servicio->id }}"> {{ $servicio->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group flex flex-col mt-3">
                            <div class="flex justify-between">
                                <label for="servicios"
                                    class="block mb-2 text-sm font-medium text-gray-900">Productos:</label>
                                <button class="flex" type="button" id="openModalProducto"><img
                                        src="{{ asset('img/icon_add.png') }}" width="30px"
                                        alt="">agregar</button>
                            </div>
                            <div class="overflow-auto h-28">
                                <div class="flex mb-1">
                                    <input type="text" id="nombre" name="nombre" class="form-control mr-1">
                                    <input type="hidden" id="id_producto" name="id_producto">
                                    <input type="number" id="cantidad" name="cantidad" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group flex flex-col mt-3">
                            <div class="flex justify-between">
                                <label for="servicios"
                                    class="block mb-2 text-sm font-medium text-gray-900">Estudios:</label>
                                <button class="flex" type="button" id="openModalEstudio"><img
                                        src="{{ asset('img/icon_add.png') }}" width="30px"
                                        alt="">agregar</button>
                            </div>
                        </div>
                        <div class="overflow-auto h-28">
                            <div class="flex mb-1">
                                <input type="text" id="nombreDelEstudio" name="nombreDelEstudio"
                                    class="form-control mr-1">
                                <input type="hidden" id="id_estudio" name="id_estudio">
                                <input type="date" id="fecha_estudio" name="fecha_estudio" class="form-control">
                                <input type="time" id="hora_estudio" name="hora_estudio" class="form-control">
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

            document.addEventListener('DOMContentLoaded', function() {

            });

            function añadirServicio() {
                var campoProducto = document.createElement("div");
                campoProducto.innerHTML = `
        <input type="text" name="compras[]">
        <input type="number" name="compras[]">`;
                document.querySelector(".campo-producto").appendChild(campoProducto);
            }
        </script>
    @endpush
</x-app-layout>
