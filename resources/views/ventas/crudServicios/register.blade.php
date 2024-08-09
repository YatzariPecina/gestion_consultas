<x-app-layout>
    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md text-center">
        <h1 class="text-2xl font-extrabold">Registrar nuevo servicio</h1>
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
            <form action="{{ route('servicios.store') }}" method="POST" class="w-full sm:w-1/2">
                @csrf
                <div class="form-group flex flex-col">
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control"
                        placeholder="Ingrese el nombre">
                </div>
                <div class="form-group flex flex-col mt-3">
                    <label for="edad" class="block mb-2 text-sm font-medium text-gray-900">Precio:</label>
                    <input type="number" id="precio" name="precio" class="form-control" placeholder="Ingrese el precio">
                </div>
                <div class="form-group flex flex-col mt-3">
                    <label for="sexo" class="block mb-2 text-sm font-medium text-gray-900">Tipo de servicio:</label>
                    <select name="id_tipo_servicio" id="id_tipo_servicio"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">--</option>
                        @foreach ($tipos_servicio as $tipo_servicio)
                            <option value="{{ $tipo_servicio->id }}"> {{ $tipo_servicio->tipo }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-center items-center mt-3">
                    <button type="submit"
                        class="text-black bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Aceptar</button>
                    <a href="{{ route('servicios.index') }}"
                        class="text-black bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
