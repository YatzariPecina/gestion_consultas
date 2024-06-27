<x-app-layout>
    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md text-center">
        <h1 class="text-2xl font-extrabold">
            Agenda
        </h1>
    </div>

    <div class="mt-6 bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md sm:flex sm:justify-center">
        <div class="w-full flex">
            <div class="w-1/2">
                <!-- Unos pedillos-->
                Aqui se hacen unas cosillas
            </div>
            <div id="calendar" class="w-1/2"></div>
        </div>
    </div>

    <script src='https://unpkg.com/fullcalendar@5.10.0/main.min.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [{
                    title: 'Cita Estática',
                    start: '2024-06-24T17:00:00',
                    allDay: false,
                    textColor: 'black'
                }, ]
            });

            calendar.render();
        });
    </script>
</x-app-layout>
