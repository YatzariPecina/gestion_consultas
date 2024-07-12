<x-app-layout>
    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md">
        <h2 class="p-2 text-gray-900 font-semibold">Bienvenido {{ Auth::user()->rol }}</h2>
    </div>

    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md m-2">
        <div class="container">
            Aqui se pondran botones
        </div>
        <div class="sm:flex block justify-center">
            <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow w-full sm:w-1/3 my-2 sm:mx-2 flex flex-col items-start justify-between">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Servicios</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">Agrega los servicios o tipos de servicios que pueden haber en
                    una cita.</p>
                <a href="{{ route('servicios.index') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Ir
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow w-full sm:w-1/3 my-2 sm:mx-2 flex flex-col items-start justify-between">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Agregar cita</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">Agrega una cita a algun paciente.</p>
                <a href="{{ route('citas.create') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Ir
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow w-full sm:w-1/3 my-2 sm:mx-2 flex flex-col items-start justify-between">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Agenda</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">Mira la agenda del consultorio.</p>
                <a href="{{ route('agenda') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Ir
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
