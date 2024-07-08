<x-app-layout>
    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md text-center">
        <h1 class="text-2xl font-extrabold">Registrar nuevo medico</h1>
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
            <form action="{{ route('medicos.store') }}" method="POST" class="w-full sm:w-1/2">
                @csrf
                <div class="form-group flex flex-col">
                    <!-- campo para agregar el nombre del medico -->
                    <label for="name" class="">Nombre:</label>
                    <input type="text" id="name" name="name" placeholder="Ingrese el nombre">
                </div>
                <div class="form-group flex flex-col mt-3">
                    <!-- campo para agregar el correo del medico -->
                    <label for="email">Correo electronico:</label>
                    <input type="email" id="email" name="email" placeholder="Ingrese su correo electronico">
                </div>
                <!-- Password -->
                <div class="form-group flex flex-col mt-3">
                    <label for="password">Password:</label>
                    <input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="form-group flex flex-col mt-3">
                    <label for="password_confirmation">Confirmar password:</label>
                    <input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div class="form-group flex flex-col mt-3">
                    <!-- campo para agregar el telefono del medico -->
                    <label for="telefono" class="">Telefono:</label>
                    <input type="text" id="telefono" name="telefono" class=""
                        placeholder="Ingrese su telefono">
                </div>
                <div class="form-group flex flex-col mt-3">
                    <!-- campo para agregar la profesion del medico -->
                    <label for="profesion" class="">Profesion:</label>
                    <input type="text" id="profesion" name="profesion" class=""
                        placeholder="Ingrese su profesion">
                </div>
                <div class="form-group flex flex-col mt-3">
                    <!-- campo para agregar el tipo del medico -->
                    <label for="tipo_medico" class="">Tipo de
                        medico:</label>
                    <input type="text" id="tipo_medico" name="tipo_medico" class=""
                        placeholder="Ingrese el tipo de medico">
                </div>
                <div class="flex justify-center items-center mt-3">
                    <button type="submit"
                        class="text-black bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Aceptar</button>
                    <a href="{{ route('medicos.index') }}"
                        class="text-black bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
