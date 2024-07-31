<x-app-layout>
    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md text-center">
        <h1 class="text-2xl font-extrabold">
            Agenda
        </h1>
    </div>

    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md sm:flex sm:justify-center">
        <div class="w-full flex">
            <div class="w-1/3 flex flex-col px-6 items-center">
                <!-- Unos pedillos-->
                <img src="{{ asset('img/relojStyle.png') }}" alt="">
                <div class="flex">
                    <a href="{{ route('citas.create') }}"
                        class= "bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF] hover:bg-gradient-to-t hover:from-[#59d3d3] hover:to-[#9cf1a5] font-medium px-2 py-2.5 sm:px-5 me-2 mb-2 focus:outline-none text-center">Nueva
                        cita</a>
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-900 uppercase bg-gray-300">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Paciente
                            </th>
                            <th scope="col" class="px-6 py-3">
                                hora
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($citas as $cita)
                            <tr class="bg-white">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                                    {{ $cita->paciente->nombre }}
                                </th>
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    {{ $cita->fecha_cita }}
                                </td>
                                <td class="px-6 py-4 flex">
                                    <a href="#"
                                        class="font-medium text-blue-600 hover:underline py-1 px-2 border border-blue-500 rounded-lg mr-1"><i
                                            class="fa-regular fa-eye"></i></a>
                                    <a href="#"
                                        class="font-medium text-blue-600 hover:underline py-1 px-2 border border-blue-500 rounded-lg mr-1"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                    <form action="#" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            onclick="return confirm('Do you want to delete this user?');"
                                            class="font-medium text-blue-600 hover:underline py-1 px-2 border border-blue-500 rounded-lg mr-1"><i
                                                class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="calendar" class="w-2/3"></div>
        </div>
    </div>

    @push('scripts')
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const calendarEl = document.getElementById('calendar');
                const calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'es',
                    events: @json($events),
                    eventContent: function(info) {
                        // No renderizar contenido de evento
                        return {
                            html: ''
                        };
                    },
                    dateClick: function(info) {
                        console.log('Fecha seleccionada:', info.dateStr);
                    },
                    eventDidMount: function(info) {
                        // Encuentra el elemento del número del día y agrega una clase personalizada
                        let dayNumberCell = info.el.closest('.fc-daygrid-day-top');
                        if (dayNumberCell) {
                            dayNumberCell.classList.add('day-with-event');
                        }
                    }
                });
                calendar.render();
            });
            </script>
            
    @endpush
</x-app-layout>
