<x-app-layout>
    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md text-center">
        <h1 class="text-2xl font-extrabold">
            Mostrar la información del medico
        </h1>
    </div>

    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md sm:flex sm:justify-center">
        <div class="container w-full sm:w-1/2 mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md ">
            <div class="group mb-4">
                <p class="font-medium">Nombre:</p>
                <p>{{$medico->nombre}}</p>
            </div>
            <div class="group mb-4">
                <p class="font-medium">Correo electronico:</p>
                <p>{{$medico->correo}}</p>
            </div>
            <div class="group mb-4">
                <p class="font-medium">Telefono:</p>
                <p>{{$medico->telefono}}</p>
            </div>
            <div class="group mb-4">
                <p class="font-medium">Profesion:</p>
                <p>{{$medico->profesion}}</p>
            </div>
            <div class="group mb-4">
                <p class="font-medium">Tipo de medico:</p>
                <p>{{$medico->tipo_medico}}</p>
            </div>
            <div class="flex justify-center">
                <a href="{{ route('medicos.index') }}" class="text-black bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Regresar</a>
            </div>
        </div>
    </div>
</x-app-layout>
