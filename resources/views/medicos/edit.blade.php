<x-app-layout>
    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md text-center">
        <h1 class="text-2xl font-extrabold">Editar información</h1>
    </div>

    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md sm:flex sm:justify-center">
        <form action="{{ route('medicos.update', $medico->id) }}" method="POST" class="w-full sm:w-1/2">
            @csrf
            @method('PUT')
            <div class="form-group flex flex-col">
                <!-- campo para agregar el nombre del medico -->
                <label for="name" class="">Nombre:</label>
                <input type="text" value="{{ $medico->name }}" id="name" name="name"
                    placeholder="Ingrese el nombre">
            </div>
            <div class="form-group flex flex-col mt-3">
                <!-- campo para agregar el correo del medico -->
                <label for="email" class="">Correo
                    electronico:</label>
                <input type="email" id="email" name="email" placeholder="Ingrese su correo electronico"
                    value="{{ $medico->email }}">
            </div>
            <div class="form-group flex flex-col mt-3">
                <!-- campo para agregar el telefono del medico -->
                <label for="telefono" class="">Telefono:</label>
                <input type="text" id="telefono" name="telefono" placeholder="Ingrese su telefono"
                    value="{{ $medico->telefono }}">
            </div>
            <div class="form-group flex flex-col mt-3">
                <!-- campo para agregar la profesion del medico -->
                <label for="profesion" class="">Profesion:</label>
                <input type="text" id="profesion" name="profesion" placeholder="Ingrese su profesion"
                    value="{{ $medico->profesion }}">
            </div>
            <div class="form-group flex flex-col mt-3">
                <!-- campo para agregar el tipo del medico -->
                <label for="tipo_medico" class="">Tipo de
                    medico:</label>
                <input type="text" id="tipo_medico" name="tipo_medico" placeholder="Ingrese el tipo de medico"
                    value="{{ $medico->tipo_medico }}">
            </div>
            <div class="flex justify-center items-centermt-4 mt-3">
                <button type="submit"
                    class="text-black bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Aceptar</button>
                <a href="{{ route('medicos.index') }}"
                    class="text-black bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
