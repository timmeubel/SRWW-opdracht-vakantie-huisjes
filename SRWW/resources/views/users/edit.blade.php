<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruiker Aanpassen</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Gebruiker Aanpassen</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Voornaam:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('users.index') }}" class="text-gray-600 hover:underline">Annuleren</a>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded font-semibold transition">
                    Opslaan
                </button>
            </div>
        </form>
    </div>
</body>
</html>