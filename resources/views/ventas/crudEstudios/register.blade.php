<x-app-layout>
    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md text-center">
        <h1 class="text-2xl font-extrabold">Registrar nuevo paciente</h1>
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
            <form action="{{ route('pacientes.store') }}" method="POST" class="w-full sm:w-1/2">
                @csrf
                <div class="form-group flex flex-col">
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control"
                        placeholder="Ingrese el nombre">
                </div>
                <div class="form-group flex flex-col mt-3">
                    <label for="fecha_nacimiento" class="block mb-2 text-sm font-medium text-gray-900">Fecha de
                        nacimiento:</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control"
                        placeholder="Ingrese la fecha de nacimiento">
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
                    <label for="telefono_paciente" class="block mb-2 text-sm font-medium text-gray-900">Telefono del
                        paciente:</label>
                    <input type="tel" id="telefono_paciente" name="telefono_paciente" class="form-control"
                        placeholder="Ingrese el telefono del paciente">
                </div>
                <div class="form-group flex flex-col mt-3">
                    <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900">Direccion:</label>
                    <input type="text" id="direccion" name="direccion" class="form-control"
                        placeholder="Ingrese la direccion del paciente">
                </div>
                <div class="form-group flex flex-col mt-3">
                    <label for="nacionalidad" class="block mb-2 text-sm font-medium text-gray-900">Nacionalidad:</label>
                    <input type="text" id="nacionalidad" name="nacionalidad" class="form-control"
                        placeholder="Ingrese la nacionalidad del paciente">
                </div>
                <div class="form-group flex flex-col mt-3">
                    <label for="correo" class="block mb-2 text-sm font-medium text-gray-900">Correo
                        electronico:</label>
                    <input type="email" id="correo" name="correo" class="form-control"
                        placeholder="Ingrese el correo electronico">
                </div>
                <div class="form-group flex flex-col mt-3">
                    <label for="nombre_contacto_emergencia" class="block mb-2 text-sm font-medium text-gray-900">Nombre
                        del contacto de emergencia:</label>
                    <input type="text" id="nombre_contacto_emergencia" name="nombre_contacto_emergencia"
                        class="form-control">
                </div>
                <div class="form-group flex flex-col mt-3">
                    <label for="telefono_contacto_emergencia"
                        class="block mb-2 text-sm font-medium text-gray-900">Telefono del contacto de
                        emergencia:</label>
                    <input type="tel" id="telefono_contacto_emergencia" name="telefono_contacto_emergencia"
                        class="form-control">
                </div>
                <div class="form-group flex flex-col mt-3">
                    <label for="rfc" class="block mb-2 text-sm font-medium text-gray-900">Ingresa tu RFC:</label>
                    <input type="text" id="rfc" name="RFC" maxlength="18" class="form-control">
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
                <div class="form-group flex flex-col mt-3">
                    <label for="observaciones"
                        class="block mb-2 text-sm font-medium text-gray-900">Observaciones:</label>
                    <textarea id="observaciones" name="observaciones" rows="4"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Escribe tus observaciones"></textarea>
                </div>
                <div class="flex justify-center items-center mt-3">
                    <a href="{{ route('pacientes.index') }}"
                        class="text-black bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Cancelar</a>
                    <button type="submit"
                        class="text-black bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
