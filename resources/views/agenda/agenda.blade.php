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
            </div>
            <div id="calendar" class="w-2/3"></div>
        </div>
    </div>

    @push('scripts')
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
        <script src='fullcalendar/core/index.global.js'></script>
        <script src='fullcalendar/core/locales/es.global.js'></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const calendarEl = document.getElementById('calendar')
                const calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'es',
                    events: @json($events),
                })
                calendar.render()
            })
        </script>
    @endpush
</x-app-layout>
