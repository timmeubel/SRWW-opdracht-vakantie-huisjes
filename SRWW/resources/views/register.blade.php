<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Registreren</title>
    <title>Registreren - Vakantie Huisjes</title>
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/regin.css') }}">
</head>
<body class="auth-page">

    <div class="auth-container">
        <!-- Logo / Icon -->
        <div class="auth-logo">
            <span class="logo-text">Vakantie Huisjes</span>
        </div>

        <h1 class="auth-title">Account aanmaken</h1>
        <p class="auth-subtitle">Registreer je als lid om deel te nemen aan lotingen</p>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="alert-icon">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 112 0v4a1 1 0 11-2 0V6zm1 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                </svg>
                <div class="alert-content">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}" class="auth-form">
            @csrf

            <div class="form-group">
                <label for="name">Naam</label>
                <div class="input-wrapper">
                    <input type="text" id="name" name="name" placeholder="Je volledige naam" value="{{ old('name') }}" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="email">E-mailadres</label>
                <div class="input-wrapper">
                    <input type="email" id="email" name="email" placeholder="naam@voorbeeld.nl" value="{{ old('email') }}" required>
                </div>
                @error('email')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" placeholder="Minimaal 8 tekens" required>
                </div>
            </div>

            <button type="submit" class="btn-submit">Registreren</button>
        </form>

        <div class="auth-footer-text">
            <span>Heb je al een account?</span>
            <a href="{{ route('login') }}" class="auth-link">Log hier in</a>
        </div>
        
        <div class="auth-back-home">
            <a href="/" class="back-link">&larr; Terug naar Home</a>
        </div>
    </div>

</body>
</html>