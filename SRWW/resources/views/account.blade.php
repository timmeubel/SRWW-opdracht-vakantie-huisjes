<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Account - Vakantie Huisjes</title>
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Page-specific styles for the Account page, built to match the wireframe */
        .account-section {
            padding: 60px 20px;
        }

        .account-grid {
            display: grid;
            grid-template-columns: 1fr 1.3fr;
            gap: 30px;
            max-width: 1100px;
            margin: 0 auto;
        }

        @media (max-width: 800px) {
            .account-grid {
                grid-template-columns: 1fr;
            }
        }

        .account-panel {
            border: 1px solid var(--border-color, #ffffff);
            border-radius: 10px;
            padding: 30px;
            background: var(--panel-bg, #ffffff);
        }

        /* Left panel: profile */
        .profile-top {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .profile-avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 2px solid var(--accent-color, #ffffff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            flex-shrink: 0;
            overflow: hidden;
            background: var(--panel-bg-alt, #ffffff);
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-info-box {
            border: 1px solid var(--border-color, #ffffff);
            border-radius: 8px;
            padding: 14px 18px;
            flex: 1;
        }

        .profile-info-box h3 {
            margin: 0 0 4px 0;
            font-size: 1.1rem;
        }

        .profile-info-box p {
            margin: 0;
            opacity: 0.8;
            font-size: 0.95rem;
        }

        .faq-box {
            border: 1px solid var(--border-color, #ffffff);
            border-radius: 8px;
            padding: 18px;
            margin-top: 10px;
        }

        .faq-box h4 {
            margin: 0 0 8px 0;
        }

        .faq-box p,
        .faq-box a {
            margin: 0;
            opacity: 0.85;
        }

        .faq-box a {
            color: var(--accent-color, #6ec1e4);
            text-decoration: none;
        }

        .faq-box a:hover {
            text-decoration: underline;
        }

        /* Right panel: loting info */
        .loting-panel h2 {
            margin-top: 0;
        }

        .loting-status {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            border: 1px solid var(--accent-color, #6ec1e4);
            margin-bottom: 18px;
        }

        .loting-details dl {
            display: grid;
            grid-template-columns: 140px 1fr;
            row-gap: 10px;
            column-gap: 10px;
            margin: 0;
        }

        .loting-details dt {
            opacity: 0.7;
        }

        .loting-details dd {
            margin: 0;
        }

        .account-actions {
            margin-top: 30px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .nav-account-link {
            margin-right: auto;
            padding-left: 10px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-spacer"></div>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="/#huisjes">Huisjes</a></li>
                <li><a href="#">Informatie</a></li>
                <li><a href="/loting">Loting</a></li>
                <li><a href="/account" class="active">Account</a></li>
            </ul>
            <div class="nav-login">
    <a href="{{ route('logout') }}" class="cta-button-small">Uit loggen</a>
</div>
        </nav>
    </header>

    <main class="main-content">
        <section class="account-section">
            <div class="section-container">
                <h1>Mijn Account</h1>
                <p class="section-subtitle">Beheer uw gegevens en bekijk uw lotingstatus</p>

                <div class="account-grid">
                    <!-- Left panel: profile + info -->
                    <div class="account-panel profile-panel">
                        <div class="profile-top">
                            <div class="profile-avatar">
                                @if(auth()->user()->avatar ?? false)
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Profielfoto">
                                @else
                                    <span>👤</span>
                                @endif
                            </div>
                            <div class="profile-info-box">
                                <h3>{{ auth()->user()->name ?? 'Naam onbekend' }}</h3>
                                <p>{{ auth()->user()->email ?? 'email@onbekend.nl' }}</p>
                            </div>
                        </div>

                        <div class="faq-box">
                            <h4>Vragen over account of loting?</h4>
                            <p>Mail ons op: <a href="mailto:info@srww.nl">info@srww.nl</a></p>
                        </div>
                    </div>

                    <!-- Right panel: loting info -->
                    <div class="account-panel loting-panel">
                        <span class="loting-status">
                            @if($activeInschrijving ?? false)
                                Actief ingeschreven
                            @else
                                Geen actieve inschrijving
                            @endif
                        </span>
                        <h2>Info over de loting waar je aan mee doet</h2>

                        @if($activeInschrijving ?? false)
                            <div class="loting-details">
                                <dl>
                                    <dt>Huisje</dt>
                                    <dd>{{ $activeInschrijving->huisje->naam ?? '-' }}</dd>

                                    <dt>Periode</dt>
                                    <dd>{{ $activeInschrijving->startdatum ?? '-' }} t/m {{ $activeInschrijving->einddatum ?? '-' }}</dd>

                                    <dt>Status</dt>
                                    <dd>{{ $activeInschrijving->status ?? 'In behandeling' }}</dd>

                                    <dt>Inschrijfdatum</dt>
                                    <dd>{{ $activeInschrijving->created_at?->format('d-m-Y') ?? '-' }}</dd>
                                </dl>
                            </div>

                            <div class="account-actions">
                                <a href="/loting" class="cta-button">Bekijk loting</a>
                            </div>
                        @else
                            <p>U doet momenteel niet mee aan een loting. Bekijk de beschikbare huisjes en schrijf u in voor een loting.</p>
                            <div class="account-actions">
                                <a href="/#huisjes" class="cta-button">Bekijk huisjes</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 Vakantie Huisjes. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>