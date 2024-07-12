<x-app-layout>
    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md text-center">
        <h1 class="text-2xl font-extrabold">Registrar nueva cita</h1>
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
            <form action="{{ route('citas.store') }}" method="POST" class="w-full sm:w-1/2">
                @csrf
                <div class="form-group flex flex-col mt-3">
                    <label for="id_paciente" class="block mb-2 text-sm font-medium text-gray-900">Paciente de la
                        cita:</label>
                    <select name="id_paciente" id="id_paciente"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">--</option>
                        @foreach ($pacientes as $paciente)
                            <option value="{{ $paciente->id }}"> {{ $paciente->nombre }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group flex flex-col">
                    <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900">Asunto o
                        descripción:</label>
                    <input type="text" id="descripcion" name="descripcion" class="form-control"
                        placeholder="Ingrese el nombre">
                </div>
                <div class="form-group flex flex-col">
                    <label for="fecha_cita" class="block mb-2 text-sm font-medium text-gray-900">Fecha:</label>
                    <input type="date" id="fecha_cita" name="fecha_cita" class="form-control">
                </div>
                <div class="form-group flex flex-col">
                    <label for="hora_cita" class="block mb-2 text-sm font-medium text-gray-900">Hora:</label>
                    <input type="time" id="hora_cita" name="hora_cita" class="form-control">
                </div>
                <div class="flex justify-center items-center mt-3">
                    <button type="submit"
                        class="text-black bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Aceptar</button>
                    <a href="#"
                        class="text-black bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    @push('scripts')
        <script>
            function regresar(event){
                event.preventDefault();
                window.history.back();
            }
        </script>
    @endpush
</x-app-layout>
