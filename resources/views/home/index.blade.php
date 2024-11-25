<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagrindinis puslapis</title>
    <style>
        .fog-effect {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(3px);
            z-index: 0;
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
    </style>
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
        <a class="btn btn-ghost text-xl">Konferencijos</a>
    </div>
    <div class="navbar-end">
        @if(Auth::check())
            <!-- Prisijungusio vartotojo sekcija -->
            <details class="dropdown">
                <summary class="btn m-1 btn-ghost">{{ Auth::user()->name }}</summary>
                <ul class="menu dropdown-content bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                </ul>
            </details>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <!-- Neprisijungusio vartotojo sekcija -->
            <a href="{{ route('login') }}" class="btn btn-ghost">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        @endif
    </div>
</div>

<!-- Hero Section -->
<div class="hero min-h-screen flex items-center justify-center relative" style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="fog-effect"></div> <!-- Fog effect div -->
    <div class="hero-content text-black text-center">
        <div class="max-w-md">
            <h1 class="mb-5" style="font-size: 4rem; font-weight: bold;">Konferencijų registracija</h1>
            <p class="mb-5" style="font-size: 1.25rem; font-weight: bold;">
                Prisijunkite prie mūsų konferencijų, kur dalyviai gali mokytis, bendrauti ir plėtoti naujas idėjas.
                Mūsų platforma suteikia galimybę lengvai užsiregistruoti ir dalyvauti įvairiose konferencijose visame pasaulyje.
            </p>
            <a href="{{ route('register') }}" class="btn btn-primary">Pradėti dabar</a>
        </div>
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>



{{--<div class="container">--}}
{{--    <h1>Pagrindinis puslapis</h1>--}}

{{--    <h2>Studento informacija:</h2>--}}
{{--    <ul>--}}
{{--        <li>Vardas: {{ $studentInfo['name'] }}</li>--}}
{{--        <li>Pavardė: {{ $studentInfo['surname'] }}</li>--}}
{{--        <li>Grupė: {{ $studentInfo['group'] }}</li>--}}
{{--    </ul>--}}

{{--    <h2>Nuorodos į vaidmenų posistemius:</h2>--}}
{{--    <ul>--}}
{{--        <li><a href="{{ route('client.index') }}">Kliento posistemis</a></li>--}}
{{--        <li><a href="{{ route('employee.dashboard') }}">Darbuotojo posistemis</a></li>--}}
{{--        <li><a href="{{ route('admin.dashboard') }}">Sistemos administratoriaus posistemis</a></li>--}}
{{--    </ul>--}}
{{--</div>--}}
