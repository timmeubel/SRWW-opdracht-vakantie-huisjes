<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $user->name }}">
    <input type="email" name="email" value="{{ $user->email }}">

    <button type="submit">Opslaan</button>
</form>

<form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Weet je het zeker?');">
    @csrf
    @method('DELETE')
    <button type="submit">Verwijderen</button>
</form>
</body>
</html>