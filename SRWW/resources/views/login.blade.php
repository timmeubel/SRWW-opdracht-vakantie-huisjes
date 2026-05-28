<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>login</h1>

    <form method="POST" action="/register">
    @csrf

    <input type="text" name="name" placeholder="Naam">
    <br><br>

    <input type="email" name="email" placeholder="Email">
    <br><br>

    <input type="password" name="password" placeholder="Wachtwoord">
    <br><br>

    <button type="submit">login</button>
    <div>heb je nog geen account regristreer hier</div>
     <button onclick="window.location='{{ route('register') }}'">
    Register
</button>

</form>

</body>
</html>
</body>
</html>