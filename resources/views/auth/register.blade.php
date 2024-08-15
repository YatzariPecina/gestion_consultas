<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Rol -->
        <div class="mt-4">
            <label for="rol" class="block mb-2 text-sm font-medium text-gray-900">Selecciona una
                opcion</label>
            <select id="rol" name="rol"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="">Escoge un rol</option>
                <option value="Administrador">Administrador</option>
                <option value="Recepcionista">Recepcionista</option>
                <option value="Medico">Medico</option>
                <option value="Enfermera">Enfermera</option>
            </select>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-3">
            <x-primary-button class="ms-4 bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF]">
                <span class="text-black">{{ __('Registrar') }}</span>
            </x-primary-button>
            <x-primary-button class="ms-4 bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF]">
                <a href="{{ route('users.index') }}" class="text-black">Cancelar</a>
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
