<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/alpinejs@3.x.x" defer></script>
</head>
<body class="font-sans antialiased bg-gray-100">
    
    <div class="min-h-screen">
       

        {{-- Barre de navigation --}}
        @auth
            @include('navigation-menu')
        @endauth

        <!-- Page Heading -->
        @hasSection('header')
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @yield('content')

            {{-- Si Jetstream utilise des composants avec $slot --}}
            @isset($slot)
                {{ $slot }}
            @endisset
        </main>
    </div>

    @stack('modals')
</body>
</html>
