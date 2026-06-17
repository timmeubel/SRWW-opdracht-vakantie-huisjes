<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    @if ($errors->any())
        <div style="color: red;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
        <br><br>

        <input type="password" name="password" placeholder="Wachtwoord">
        <br><br>

        <button type="submit">Login</button>
    </form>

    <div>Heb je nog geen account? Registreer hier:</div>
    <button onclick="window.location='{{ route('register') }}'">
        Registreer
    </button>

</body>
</html>