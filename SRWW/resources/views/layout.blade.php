<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Vakantie Huisjes')</title>
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-spacer"></div>
            <ul class="nav-links">
                @auth
                    <li><a href="/account">account</a></li>
                @endauth
                <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="/#huisjes">Huisjes</a></li>
                <li><a href="/loting" class="{{ request()->is('loting') ? 'active' : '' }}">Loting</a></li>
            </ul>
            <div class="nav-login">
                @auth
                    <a href="/logout">Uitloggen</a>
                @else
                    <a href="/login">Login</a>
                @endauth
            </div>
        </nav>
    </header>

    @yield('content')

    <footer>
        <p>&copy; 2026 Vakantie Huisjes. Alle rechten voorbehouden.</p>
    </footer>

    @yield('scripts')
</body>
</html>