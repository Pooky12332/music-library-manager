<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SpinDex') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 antialiased font-sans flex flex-col min-h-screen">
    <div id="app" class="flex-grow">
        <!-- Header -->
        <header class="bg-black text-white border-b border-gray-700">
            <div class="container mx-auto flex justify-between items-center px-6 py-4">
                <a href="{{ route('home') }}" class="text-2xl font-bold no-underline">
                    {{ config('app.name', 'SpinDex') }}
                </a>
                <nav class="flex items-center space-x-4 text-sm">
                    @auth
                        <a href="{{ route('shelves.index') }}" class="hover:underline">My Shelves</a>
                        <span>{{ Auth::user()->name }}</span>
                        <a href="{{ route('logout') }}"
                           class="hover:underline"
                           onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="hover:underline">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="hover:underline">Register</a>
                        @endif
                    @endauth
                </nav>
            </div>
        </header>

        <!-- Main Content -->
        <main class="container mx-auto px-6 py-8">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-black text-white text-center py-4">
        <p>&copy; {{ date('Y') }} {{ config('app.name', 'SpinDex') }}. All rights reserved.</p>
    </footer>
</body>
</html>
