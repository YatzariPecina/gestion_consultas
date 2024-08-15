<x-app-layout>
    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')
        <!-- Name -->
        <div>
            <label for="name">Nombre:</label>
            <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required
                autofocus autocomplete="name" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email">Correo electronico:</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}"
                required/>
        </div>

        <!-- Rol -->
        <div class="mt-4">
            <label for="rol" class="block mb-2 text-sm font-medium text-gray-900">Selecciona una opcion</label>
            <select id="rol" name="rol"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="">Escoge un rol</option>
                @php
                    $roles = ['Administrador', 'Recepcionista', 'Medico', 'Enfermera'];
                @endphp
                @foreach($roles as $rol)
                    <option value="{{ $rol }}" {{ $user->rol == $rol ? 'selected' : '' }}>{{ $rol }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-center mt-3">
            <button type="submit" class="ms-4 bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF]">
                <span class="text-black">Actualizar</span>
            <button>
            <button class="ms-4 bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF]">
                <a href="{{ route('users.index') }}" class="text-black">Cancelar</a>
            </button>
        </div>
    </form>
</x-app-layout>