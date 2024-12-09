<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>

    @yield('style')

    {{-- Floowbite --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('img/favicon_rounded.jpg') }}" type="image/x-icon">

    @livewireStyles
</head>

<body>
    <header>
        <!-- Navbar común -->
        @include('comics.layouts.nav_bar')
    </header>


    <main>
        <!-- Contenido único para cada vista -->
        @yield('content')
    </main>


    <footer>
        <!-- Navbar común -->
        @include('comics.layouts.footer')
    </footer>



    <!-- Scripts comunes -->
    @livewireScripts
</body>

</html>
