<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informacion') }}
        </h2>
    </x-slot>

    <div class="p-6">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="m-auto w-1/2 p-4 rounded-md shadow-lg bg-slate-50">
            <div class="flex">
                <label for="id" class="block mb-2 mr-2 text-lg font-medium text-gray-900">Id del paciente:</label>
                <div class="col-md-6 text-lg">
                    {{ $paciente->id }}
                </div>
            </div>
            <div class="flex">
                <label for="" class="block mb-2 mr-2 text-lg font-medium text-gray-900">Nombre del paciente:</label>
                <div class="col-md-6 text-lg">
                    {{ $paciente->nombre }}
                </div>
            </div>
            <div class="flex">
                <label for="" class="block mb-2 mr-2 text-lg font-medium text-gray-900">Fecha de nacimiento:</label>
                <div class="col-md-6 text-lg">
                    {{ $paciente->fecha_nacimiento }}
                </div>
            </div>
            <div class="flex">
                <label for="" class="block mb-2 mr-2 text-lg font-medium text-gray-900">Sexo:</label>
                <div class="col-md-6 text-lg">
                    {{ $paciente->sexo }}
                </div>
            </div>
            <div class="flex">
                <label for="" class="block mb-2 mr-2 text-lg font-medium text-gray-900">Telefono:</label>
                <div class="col-md-6 text-lg">
                    {{ $paciente->telefono_paciente }}
                </div>
            </div>
            <div class="flex">
                <label for="" class="block mb-2 mr-2 text-lg font-medium text-gray-900">Medico a cargo:</label>
                <div class="col-md-6 text-lg">
                    {{ $paciente->medico->nombre }}
                </div>
            </div>
            <div class="flex">
                <label for="" class="block mb-2 mr-2 text-lg font-medium text-gray-900">Nacionalidad:</label>
                <div class="col-md-6 text-lg">
                    {{ $paciente->nacionalidad }}
                </div>
            </div>
            <div class="flex">
                <label for="" class="block mb-2 mr-2 text-lg font-medium text-gray-900">Direccion:</label>
                <div class="col-md-6 text-lg">
                    {{ $paciente->direccion }}
                </div>
            </div>
            <div class="flex">
                <label for="" class="block mb-2 mr-2 text-lg font-medium text-gray-900">Correo electronico:</label>
                <div class="col-md-6 text-lg">
                    {{ $paciente->correo }}
                </div>
            </div>
            <div class="flex">
                <label for="" class="block mb-2 mr-2 text-lg font-medium text-gray-900">Nombre del contacto de emergencia:</label>
                <div class="col-md-6 text-lg">
                    {{ $paciente->nombre_contacto_emergencia }}
                </div>
            </div>
            <div class="flex">
                <label for="" class="block mb-2 mr-2 text-lg font-medium text-gray-900">Telefono del contacto de emergencia:</label>
                <div class="col-md-6 text-lg">
                    {{ $paciente->telefono_contacto_emergencia }}
                </div>
            </div>
            <div class="flex">
                <label for="" class="block mb-2 mr-2 text-lg font-medium text-gray-900">RFC:</label>
                <div class="col-md-6 text-lg">
                    {{ $paciente->rfc }}
                </div>
            </div>
            <div class="flex">
                <label for="" class="block mb-2 mr-2 text-lg font-medium text-gray-900">Observaciones:</label>
                <div class="col-md-6 text-lg">
                    {{ $paciente->observaciones }}
                </div>
            </div>
            <div class="">
                <a href="{{ route('pacientes.index') }}"
                    class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white focus:outline-none">
                    <span
                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
                        Regresar
                    </span>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
