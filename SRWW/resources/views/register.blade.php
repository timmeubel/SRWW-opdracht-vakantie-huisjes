<!DOCTYPE html>
<html>
<head>
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

    <input type="password" name="password" placeholder="Wachtwoord">
    <br><br>

    <a href="{{ route('registreer.show') }}" class="btn btn-primary">
    Ga naar Contact
</a>

</form>

</body>
</html>