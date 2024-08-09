<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inicio | Gestion de consultas</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-300">
    <div class="">
        <header class="flex justify-center items-center p-5 flex-wrap bg-gradient-to-t from-[#60ECEC] to-[#A6FFAF]">
            <div class="flex lg:justify-center lg:col-start-2 w-auto h-12">
                <img src="{{ asset('img/logo.png') }}">
            </div>
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end mr-3">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="rounded-md text-center px-3 py-2 text-black ring-1 ring-transparent transition hover:bg-gray-300 hover:text-black/70 focus:outline-none">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="rounded-md text-center px-3 py-2 text-black ring-1 ring-transparent transition hover:bg-gray-300 hover:text-black/70 focus:outline-none">
                            Iniciar sesion
                        </a>
                    @endauth
                </nav>
            @endif
        </header>

        <main class="mt-6 bg-gray-300">
            <div class="bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md">
                <img src="{{ asset('img/logo.png') }}">
            </div>
            <div class="bg-white p-6 mx-6 mb-6 rounded-2xl drop-shadow-md">
                <h2>SERVICIOS QUE OFRECEMOS:</h2>
                @forelse ($servicios as $servicio)
                    <div href="#"
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">

                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                            {{ $servicio->nombre }}
                        </h5>
                        <p class="font-normal text-gray-700">
                            {{ $servicio->precio }}
                        </p>
                    </div>
                @empty
                    <p>No hay servicios</p>
                @endforelse
            </div>
        </main>

        <footer class="bg-white shadow">
            <div class="w-full max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
                <span class="text-sm text-gray-800 sm:text-center">© 2023 Hesiptial. All Rights Reserved.
                </span>
                <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-800 sm:mt-0">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
        </footer>

    </div>
</body>

</html>
