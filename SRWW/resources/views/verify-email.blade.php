<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifieer je e-mail</title>
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .verify-container {
            max-width: 600px;
            margin: 60px auto;
            padding: 0 20px;
            box-sizing: border-box;
        }

        .verify-card {
            background: var(--color-white);
            padding: 50px 40px;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.03), 0 2px 4px -1px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(0, 0, 0, 0.04);
        }

        .verify-card h1 {
            font-size: 2rem;
            color: var(--color-text-dark);
            margin-top: 0;
            margin-bottom: 24px;
            font-weight: 800;
            font-family: 'Outfit', 'Inter', Arial, sans-serif;
        }

        .verify-card p {
            font-size: 1rem;
            color: var(--color-text-light);
            line-height: 1.8;
            margin-bottom: 16px;
            font-family: 'Outfit', 'Inter', Arial, sans-serif;
        }

        .verify-card strong {
            color: var(--color-text-dark);
        }

        .email-highlight {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 16px;
            border-left: 4px solid #0f766e;
            border-radius: 8px;
            margin: 20px 0;
            font-weight: 600;
            color: #0f766e;
        }

        .verify-card button {
            display: inline-block;
            background-color: #0f766e;
            color: var(--color-white);
            padding: 12px 24px;
            border: none;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 4px 14px rgba(15, 118, 110, 0.3);
            margin-top: 20px;
            margin-right: 12px;
            font-family: 'Outfit', 'Inter', Arial, sans-serif;
        }

        .verify-card button:hover {
            background-color: #0d5c56;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(15, 118, 110, 0.4);
        }

        .verify-card button:active {
            transform: translateY(0);
        }

        .verify-card .btn-secondary {
            background-color: var(--color-secondary);
            color: var(--color-text-dark);
            box-shadow: none;
        }

        .verify-card .btn-secondary:hover {
            background-color: #e8e8e8;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body style="background-color: var(--color-bg-body);">
    <div class="verify-container">
        <div class="verify-card">
            <h1>Verifieer je e-mailadres</h1>

            <p>Bedankt voor je registratie! Je account is aangemaakt.</p>

            <p><strong>Stap 1:</strong> We hebben een verificatielink naar je e-mailadres gestuurd:</p>
            <div class="email-highlight">{{ session('email') }}</div>

            <p><strong>Stap 2:</strong> Open je e-mailaccount en klik op de verificatielink</p>

            <p><strong>Stap 3:</strong> Je account zal direct geactiveerd worden</p>

            <p>Is de e-mail niet aangekomen? Controleer dan je spam- of junk-folder.</p>

            <button onclick="window.location='{{ route('login') }}'">
                Ga naar login
            </button>

            <button class="btn-secondary" onclick="window.location='/'">
                Terug naar start
            </button>
        </div>
    </div>
</body>
</html>