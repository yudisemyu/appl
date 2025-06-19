@props(['header'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SkillHub') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Custom Styles (Inline or from public/css) -->
    <link rel="stylesheet" href="{{ asset('css/skillhub.css') }}"> {{-- ⬅️ Buat file ini di public/css --}}

    <!-- Vite (Laravel default asset loader) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="margin: 0; font-family: 'Segoe UI', sans-serif; background: #fff; overflow-x: hidden;">

    <!-- Header -->
    <header>
        <div class="left">
            <img src="https://upload.wikimedia.org/wikipedia/sco/thumb/c/cc/Chelsea_FC.svg/2048px-Chelsea_FC.svg.png" alt="Logo">
            <strong>SkillHub</strong>
        </div>
        <div class="right">
            @auth
                <a href="{{ route('dashboard') }}" class="login">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="login" style="border: none; background: transparent; cursor: pointer;">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="login">Login</a>
                <a href="{{ route('register') }}" class="login">Register</a>
            @endauth
        </div>
    </header>

    <!-- Page Heading -->
    @isset($header)
        <div class="container" style="padding-top: 30px;">
            {{ $header }}
        </div>
    @endisset

    <!-- Page Content -->
    <main class="container" style="padding-top: 20px;">
        {{ $slot }}
    </main>

</body>
</html>
