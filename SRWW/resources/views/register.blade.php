<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Registreren</title>
</head>
<body>

<h1>Registreren</h1>

<form method="POST" action="/register">
    @csrf

    <input type="text" name="name" placeholder="Naam">
    <br><br>

    <input type="email" name="email" placeholder="Email">
    <br><br>
    @error('email')
    <p>{{ $message }}</p>
@enderror
    <input type="password" name="password" placeholder="Wachtwoord">
    <br><br>

 <button type="submit">
    Registreren
</button>

</form>

</body>
</html>