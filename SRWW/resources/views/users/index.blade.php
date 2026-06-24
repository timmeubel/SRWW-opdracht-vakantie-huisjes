<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruikers CRUD</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Gebruikers Beheer</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full table-auto border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-200 text-left text-gray-700">
                    <th class="p-3 border">ID</th>
                    <th class="p-3 border">Naam</th>
                    <th class="p-3 border">Email</th>
                    <th class="p-3 border">Admin?</th>
                    <th class="p-3 border text-center">Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3 border">{{ $user->id }}</td>
                        <td class="p-3 border">{{ $user->name }} {{ $user->last_name }}</td>
                        <td class="p-3 border">{{ $user->email }}</td>
                        <td class="p-3 border">
                            @if($user->is_admin)
                                <span class="bg-green-500 text-white px-2 py-1 rounded text-xs font-bold">Ja</span>
                            @else
                                <span class="bg-gray-400 text-white px-2 py-1 rounded text-xs font-bold">Nee</span>
                            @endif
                        </td>
                        <td class="p-3 border flex justify-center gap-2">
                            <form action="{{ route('users.toggleAdmin', $user->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm font-medium transition">
                                    {{ $user->is_admin ? 'Ontneem Admin' : 'Maak Admin' }}
                                </button>
                            </form>

                            <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm font-medium transition">
                                Editen
                            </a>

                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Weet je heel zeker dat je deze gebruiker wilt verwijderen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm font-medium transition">
                                    Verwijderen
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ url('/admin') }}" class="btn-admin">
    Ga naar Admin Panel
</a>
</body>
</html>