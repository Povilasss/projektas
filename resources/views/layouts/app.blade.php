<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Puslapio pavadinimas')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
<div class="navbar bg-base-100">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </div>
            <ul
                tabindex="0"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                @if(Auth::check() && Auth::user()->hasRole('client'))
                    <li><a href="{{ route('client.index') }}">Kliento posistemis</a></li>
                @endif

                @if(Auth::check() && Auth::user()->hasRole('employee'))
                    <li><a href="{{ route('employee.dashboard') }}">Darbuotojo posistemis</a></li>
                @endif

                @if(Auth::check() && Auth::user()->hasRole('admin'))
                    <li><a href="{{ route('admin.dashboard') }}">Sistemos administratoriaus posistemis</a></li>
                @endif
            </ul>

        </div>
    </div>
    <div class="navbar-center">
        <a class="btn btn-ghost text-xl" href="{{ route('home') }}">Konferencijos</a>
    </div>
    <div class="navbar-end">
        @if(Auth::check())
            <!-- Prisijungusio vartotojo sekcija -->
            <div class="badge badge-ghost">{{ Auth::user()->name }}</div>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-active btn-ghost">Logout</button>
            </form>
        @else
            <!-- Neprisijungusio vartotojo sekcija -->
            <a href="{{ route('login') }}" class="btn btn-ghost">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        @endif
    </div>
</div>

<!-- Pagrindinis turinys -->
<div class="flex items-center justify-center min-h-screen bg-gray-900">
    <div class="container mt-4 max-w-3xl p-6 bg-white rounded-lg shadow-md">
        @yield('content')
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>

<!-- Navigacijos juosta -->
{{--<nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
{{--    <div class="container">--}}
{{--        <a class="navbar-brand" href="{{ route('home') }}">Sistemos pavadinimas</a>--}}
{{--        <div class="collapse navbar-collapse" id="navbarNav">--}}
{{--            <ul class="navbar-nav mr-auto">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('home') }}">Pagrindinis</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('client.index') }}">Kliento posistemis</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('employee.dashboard') }}">Darbuotojo posistemis</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Administratoriaus posistemis</a>--}}
{{--                </li>--}}
{{--            </ul>--}}

{{--            <!-- Naudotojo informacija ir Logout mygtukas -->--}}
{{--            <ul class="navbar-nav ml-auto">--}}
{{--                <li class="nav-item">--}}
{{--                    <span class="nav-link">Jonas Jonaitis</span> <!-- Čia naudotojo vardas ir pavardė -->--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <button class="btn btn-outline-secondary" disabled>Logout</button> <!-- Išjungtas Logout mygtukas -->--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}



