<x-app-layout>
    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md text-center">
        <h1 class="text-2xl font-extrabold">Registrar nuevo paciente</h1>
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
            <form action="{{ route('pacientes.store') }}" method="POST" class="w-full sm:w-1/2">
                @csrf
                <div class="form-group flex flex-col">
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control"
                        placeholder="Ingrese el nombre">
                </div>
                <div class="form-group flex flex-col mt-3">
                    <label for="edad" class="block mb-2 text-sm font-medium text-gray-900">Edad:</label>
                    <input type="number" id="edad" name="edad" class="form-control"
                        placeholder="Ingrese la edad">
                </div>
                <div class="form-group flex flex-col mt-3">
                    <label for="sexo" class="block mb-2 text-sm font-medium text-gray-900">Sexo:</label>
                    <select name="sexo" id="sexo"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                    </select>
                </div>
                <div class="form-group flex flex-col mt-3">
                    <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900">Telefono:</label>
                    <input type="text" id="telefono" name="telefono" class="form-control"
                        placeholder="Ingrese el telefono">
                </div>
                <div class="form-group flex flex-col mt-3">
                    <label for="id_medico" class="block mb-2 text-sm font-medium text-gray-900">Elige el medico
                        a cargo:</label>
                    <select name="id_medico" id="id_medico"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">--</option>
                        @foreach ($medicos as $medico)
                            <option value="{{ $medico->id }}"> {{ $medico->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-center items-center mt-3">
                    <button type="submit"
                        class="text-black bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Aceptar</button>
                    <a href="{{ route('pacientes.index') }}"
                        class="text-black bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
