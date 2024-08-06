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
            <form action="{{ route('productos.store') }}" method="POST" class="w-full sm:w-1/2">
                @csrf
                <div class="form-group flex flex-col">
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control"
                        placeholder="Ingrese el nombre">
                </div>
                <div class="form-group flex flex-col mt-3">
                    <label for="marca" class="block mb-2 text-sm font-medium text-gray-900">Marca del producto:</label>
                    <input type="text" id="marca" name="marca" class="form-control"
                        placeholder="Ingrese la marca del producto">
                </div>
                <div class="form-group flex flex-col mt-3">
                    <label for="costo" class="block mb-2 text-sm font-medium text-gray-900">Precio del producto:</label>
                    <input type="text" id="costo" name="costo" class="form-control"
                        placeholder="Ingrese el precio del producto">
                </div>
                <div class="form-group flex flex-col mt-3">
                    <label for="cantidad" class="block mb-2 text-sm font-medium text-gray-900">Cantidad disponible:</label>
                    <input type="number" id="cantidad" name="cantidad" class="form-control"
                        placeholder="Ingrese la cantidad">
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
</x-app-layout>
