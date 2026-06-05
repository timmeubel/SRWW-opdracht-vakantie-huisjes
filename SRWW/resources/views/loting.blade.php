<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vakantie Huisjes</title>
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-spacer"></div>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="/#huisjes">Huisjes</a></li>
                <li><a href="/#">Informatie</a></li>
                <li><a href="/loting" class="active">Loting</a></li>
            </ul>
            <div class="nav-login">
                <a href="#">Login</a>
            </div>
        </nav>
    </header>

    <main class="main-content">
        <section class="loting-section">
            <div class="section-container">
                <h2>Loting Deelname</h2>
                <p class="section-subtitle">Meld u aan voor de loting van de vakantiehuisjes door uw top 3 voorkeuren op te geven.</p>
            </div>
        </section>

        <section class="loting-form-section">
            <div class="section-container">
                @if(session('success'))
                    <div class="preference-warning-banner" style="background: #d4edda; border-color: #28a745; color: #155724;">
                        <span class="warning-icon">🎉</span>
                        <div><strong>{{ session('success') }}</strong></div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="preference-warning-banner" style="background: #f8d7da; border-color: #dc3545; color: #721c24;">
                        <span class="warning-icon">⚠️</span>
                        <div>
                            <strong>Er zijn fouten gevonden:</strong>
                            <ul style="margin: 4px 0 0 16px;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form class="loting-form-container" action="/loting" method="POST" id="lotingForm">
                    @csrf
                    <!-- Warning banner for duplicate preference selections -->
                    <div id="duplicateWarning" class="preference-warning-banner">
                        <span class="warning-icon">⚠️</span>
                        <div>
                            <strong>Dubbel huisje gekozen:</strong> U heeft hetzelfde huisje geselecteerd voor meerdere keuzes. Zorg ervoor dat al uw keuzes uniek zijn.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="telefoonnummer">Telefoonnummer</label>
                        <input type="tel" id="telefoonnummer" name="telefoonnummer" class="form-control" placeholder="Bijv. 0612345678" required>
                    </div>

                    <div class="form-group">
                        <label for="personeelslidnummer">Personeelslidnummer</label>
                        <input type="text" id="personeelslidnummer" name="personeelslidnummer" class="form-control" placeholder="Bijv. PV-8842" required>
                    </div>

                    <div class="form-group date-range-group">
                        <label>Vakantieperiode voorkeur</label>
                        <p class="date-range-hint">Kies de gewenste start- en einddatum voor uw verblijf.</p>
                        <div class="date-range-wrapper">
                            <div class="date-input-block">
                                <label for="week_voorkeur_start">Startdatum</label>
                                <input type="date" id="week_voorkeur_start" name="week_voorkeur_start"
                                    class="form-control date-input" required
                                    min="{{ now()->addDay()->toDateString() }}"
                                    value="{{ old('week_voorkeur_start') }}">
                            </div>
                            <div class="date-range-divider">→</div>
                            <div class="date-input-block">
                                <label for="week_voorkeur_eind">Einddatum</label>
                                <input type="date" id="week_voorkeur_eind" name="week_voorkeur_eind"
                                    class="form-control date-input" required
                                    min="{{ now()->addDays(2)->toDateString() }}"
                                    value="{{ old('week_voorkeur_eind') }}">
                            </div>
                        </div>
                        <div id="dateRangeError" class="date-range-error" style="display:none;">⚠️ De einddatum moet na de startdatum liggen.</div>
                    </div>

                    <div class="form-group">
                        <label style="margin-bottom: 12px;">Uw Top 3 Voorkeuren (Klik op een keuze om een huisje te selecteren)</label>
                        
                        <ul class="cottage-selection-list">
                            <!-- Choice 1 -->
                            <li class="cottage-selection-item" data-id="1">
                                <div class="cottage-item-header">
                                    <div class="cottage-item-left">
                                       
                                        <span class="cottage-title">1e Voorkeur (Hoogste)</span>
                                    </div>
                                    <div class="cottage-status">
                                        <span class="preference-badge" id="badge-1">Geen keuze</span>
                                        <span class="dropdown-arrow">▼</span>
                                    </div>
                                </div>
                                <div class="cottage-dropdown-pane">
                                    <div class="cottage-dropdown-content">
                                        <label for="select-1">Kies uw eerste keuze vakantiehuisje:</label>
                                        <div class="preference-select-wrapper">
                                            <select id="select-1" name="huisje_1" class="preference-select" required>
                                                <option value="">-- Kies een vakantiehuisje --</option>
                                                <option value="Bosvilla De Zwijger">🏡 Bosvilla De Zwijger (Veluwe)</option>
                                                <option value="Duinhuisje Zandvoort">🏖️ Duinhuisje Zandvoort (Zandvoort)</option>
                                                <option value="Chalet Alpenrust">🚣 Chalet Alpenrust (Giethoorn)</option>
                                                <option value="Heidehut Ruinen">🌾 Heidehut Ruinen (Drenthe)</option>
                                                <option value="Wellness Lodge Vijlen">🧖 Wellness Lodge Vijlen (Limburg)</option>
                                                <option value="Appartement Strandzicht">🏢 Appartement Strandzicht (Scheveningen)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!-- Choice 2 -->
                            <li class="cottage-selection-item" data-id="2">
                                <div class="cottage-item-header">
                                    <div class="cottage-item-left">
                                
                                        <span class="cottage-title">2e Voorkeur</span>
                                    </div>
                                    <div class="cottage-status">
                                        <span class="preference-badge" id="badge-2">Geen keuze</span>
                                        <span class="dropdown-arrow">▼</span>
                                    </div>
                                </div>
                                <div class="cottage-dropdown-pane">
                                    <div class="cottage-dropdown-content">
                                        <label for="select-2">Kies uw tweede keuze vakantiehuisje:</label>
                                        <div class="preference-select-wrapper">
                                            <select id="select-2" name="huisje_2" class="preference-select">
                                                <option value="">-- Kies een vakantiehuisje --</option>
                                                <option value="Bosvilla De Zwijger">🏡 Bosvilla De Zwijger (Veluwe)</option>
                                                <option value="Duinhuisje Zandvoort">🏖️ Duinhuisje Zandvoort (Zandvoort)</option>
                                                <option value="Chalet Alpenrust">🚣 Chalet Alpenrust (Giethoorn)</option>
                                                <option value="Heidehut Ruinen">🌾 Heidehut Ruinen (Drenthe)</option>
                                                <option value="Wellness Lodge Vijlen">🧖 Wellness Lodge Vijlen (Limburg)</option>
                                                <option value="Appartement Strandzicht">🏢 Appartement Strandzicht (Scheveningen)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Choice 3 -->
                            <li class="cottage-selection-item" data-id="3">
                                <div class="cottage-item-header">
                                    <div class="cottage-item-left">
                                        <span class="cottage-title">3e Voorkeur</span>
                                    </div>
                                    <div class="cottage-status">
                                        <span class="preference-badge" id="badge-3">Geen keuze</span>
                                        <span class="dropdown-arrow">▼</span>
                                    </div>
                                </div>
                                <div class="cottage-dropdown-pane">
                                    <div class="cottage-dropdown-content">
                                        <label for="select-3">Kies uw derde keuze vakantiehuisje:</label>
                                        <div class="preference-select-wrapper">
                                            <select id="select-3" name="huisje_3" class="preference-select">
                                                <option value="">-- Kies een vakantiehuisje --</option>
                                                <option value="Bosvilla De Zwijger">🏡 Bosvilla De Zwijger (Veluwe)</option>
                                                <option value="Duinhuisje Zandvoort">🏖️ Duinhuisje Zandvoort (Zandvoort)</option>
                                                <option value="Chalet Alpenrust">🚣 Chalet Alpenrust (Giethoorn)</option>
                                                <option value="Heidehut Ruinen">🌾 Heidehut Ruinen (Drenthe)</option>
                                                <option value="Wellness Lodge Vijlen">🧖 Wellness Lodge Vijlen (Limburg)</option>
                                                <option value="Appartement Strandzicht">🏢 Appartement Strandzicht (Scheveningen)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <button type="submit" class="btn-submit-loting">Verstuur Deelname</button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 Vakantie Huisjes. Alle rechten voorbehouden.</p>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const listItems = document.querySelectorAll('.cottage-selection-item');
        const selects = document.querySelectorAll('.preference-select');
        const duplicateWarning = document.getElementById('duplicateWarning');
        const submitBtn = document.querySelector('.btn-submit-loting');
        const lotingForm = document.getElementById('lotingForm');

        // 1. Toggle item open/collapsed when clicking header
        listItems.forEach(item => {
            const header = item.querySelector('.cottage-item-header');
            header.addEventListener('click', (e) => {
                // If they click on the select dropdown or its container, don't toggle collapse
                if (e.target.closest('.cottage-dropdown-pane')) {
                    return;
                }
                
                // Close other items
                listItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('open');
                    }
                });
                
                // Toggle current item
                item.classList.toggle('open');
            });
        });

        // 2. Handle select changes & validation
        const validatePreferences = () => {
            const values = [];
            let hasDuplicates = false;

            selects.forEach(select => {
                const val = select.value;
                const cottageId = select.id.split('-')[1];
                const badge = document.getElementById(`badge-${cottageId}`);

                if (val) {
                    badge.textContent = val;
                    badge.classList.add('assigned');
                    
                    if (values.includes(val)) {
                        hasDuplicates = true;
                    }
                    values.push(val);
                } else {
                    badge.textContent = 'Geen keuze';
                    badge.classList.remove('assigned');
                }
            });

            // Toggle duplicate warning banner & submit button state
            if (hasDuplicates) {
                duplicateWarning.style.display = 'flex';
                submitBtn.disabled = true;
                submitBtn.style.opacity = '0.5';
                submitBtn.style.cursor = 'not-allowed';
            } else {
                duplicateWarning.style.display = 'none';
                submitBtn.disabled = false;
                submitBtn.style.opacity = '1';
                submitBtn.style.cursor = 'pointer';
            }
        };

        selects.forEach(select => {
            select.addEventListener('change', validatePreferences);
        });

        // 3. Date range validation
        const startInput = document.getElementById('week_voorkeur_start');
        const endInput   = document.getElementById('week_voorkeur_eind');
        const dateError  = document.getElementById('dateRangeError');

        const validateDates = () => {
            if (!startInput.value || !endInput.value) {
                dateError.style.display = 'none';
                return true;
            }
            const start = new Date(startInput.value);
            const end   = new Date(endInput.value);
            if (end <= start) {
                dateError.style.display = 'flex';
                endInput.classList.add('input-error');
                return false;
            }
            dateError.style.display = 'none';
            endInput.classList.remove('input-error');
            return true;
        };

        startInput.addEventListener('change', () => {
            // Auto-advance end date minimum to day after start
            if (startInput.value) {
                const nextDay = new Date(startInput.value);
                nextDay.setDate(nextDay.getDate() + 1);
                endInput.min = nextDay.toISOString().split('T')[0];
            }
            validateDates();
        });

        endInput.addEventListener('change', validateDates);

        // Block form submit if dates are invalid
        lotingForm.addEventListener('submit', (e) => {
            if (!validateDates()) {
                e.preventDefault();
            }
        });
    });

    </script>
</body>
</html>