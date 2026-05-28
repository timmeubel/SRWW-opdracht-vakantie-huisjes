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
                <li><a href="#">Home</a></li>
                <li><a href="#">Huisjes</a></li>
                <li><a href="#">Informatie</a></li>
                <li><a href="#">Loting</a></li>
            </ul>
            <div class="nav-login">
                <a href="#">Login</a>
            </div>
        </nav>
    </header>
    <main class="main-content">
        <!-- Hero / Informatie Section -->
        <section class="info-section">
            <div class="section-container">
                <h1>🏠 Welkom bij de SRWW</h1>
                <p class="lead-text">Hier kunt u als lid van de personeelsvereniging mee doen met de lotingen voor de huisjes die wij beschikbaar hebben door het jaar. En kunt u wat meer informatie over de verschillende huisjes vinden.</p>
                
                <div class="info-features">
                    <div class="feature-card">
                        <span class="feature-icon">🌲</span>
                        <h3>Prachtige Locaties</h3>
                        <p>Al onze huisjes bevinden zich op unieke plekken, midden in de natuur of dicht bij populaire bezienswaardigheden.</p>
                    </div>
                    <div class="feature-card">
                        <span class="feature-icon">✨</span>
                        <h3>Luxe & Comfort</h3>
                        <p>Geniet van moderne voorzieningen, comfortabele bedden, gratis Wi-Fi en een volledig uitgeruste keuken.</p>
                    </div>
                    <div class="feature-card">
                        <span class="feature-icon">🛎️</span>
                        <h3>Uitstekende Service</h3>
                        <p>Onze gastvrijheid staat voorop. We staan altijd voor u klaar om uw verblijf onvergetelijk te maken.</p>
                    </div>
                </div>
                
                <a href="#huisjes" class="cta-button">Bekijk Onze Huisjes</a>
            </div>
        </section>

        <!-- Huisjes Section -->
        <section id="huisjes" class="huisjes-section">
            <div class="section-container">
                <h2>Onze Vakantiehuisjes</h2>
                <p class="section-subtitle">Kies uit ons exclusieve aanbod van vakantiewoningen</p>
                
                <div class="huisjes-grid">
                    <!-- Huisje 1 -->
                    <div class="huisje-card">
                        <div class="huisje-image-placeholder img-forest">
                            <span class="placeholder-tag">Bosvilla</span>
                            <span class="placeholder-icon">🏡</span>
                        </div>
                        <div class="huisje-content">
                            <h3>Bosvilla De Zwijger</h3>
                            <p class="huisje-meta">📍 Veluwe | 👥 6 Pers. | 🛏️ 3 Slpk.</p>
                            <p class="huisje-description">Een prachtige, moderne bosvilla met een grote privétuin, sauna en een sfeervolle open haard. Ideaal voor natuurliefhebbers.</p>
                            <div class="huisje-footer">
                                <span class="huisje-price">€120 <small>/ nacht</small></span>
                                <a href="#" class="btn-book">Boek Nu</a>
                            </div>
                        </div>
                    </div>

                    <!-- Huisje 2 -->
                    <div class="huisje-card">
                        <div class="huisje-image-placeholder img-beach">
                            <span class="placeholder-tag">Duinhuis</span>
                            <span class="placeholder-icon">🏖️</span>
                        </div>
                        <div class="huisje-content">
                            <h3>Duinhuisje Zandvoort</h3>
                            <p class="huisje-meta">📍 Zandvoort | 👥 4 Pers. | 🛏️ 2 Slpk.</p>
                            <p class="huisje-description">Stijlvol duinhuis op slechts 5 minuten lopen van het strand. Geniet van de zonsondergang vanaf uw ruime privéterras.</p>
                            <div class="huisje-footer">
                                <span class="huisje-price">€145 <small>/ nacht</small></span>
                                <a href="#" class="btn-book">Boek Nu</a>
                            </div>
                        </div>
                    </div>

                    <!-- Huisje 3 -->
                    <div class="huisje-card">
                        <div class="huisje-image-placeholder img-lake">
                            <span class="placeholder-tag">Lakeside</span>
                            <span class="placeholder-icon">🚣</span>
                        </div>
                        <div class="huisje-content">
                            <h3>Chalet Alpenrust</h3>
                            <p class="huisje-meta">📍 Giethoorn | 👥 2 Pers. | 🛏️ 1 Slpk.</p>
                            <p class="huisje-description">Romantisch chalet direct aan het water met een eigen aanlegsteiger en bootverhuur. De perfecte plek voor een ontspannen weekendje weg.</p>
                            <div class="huisje-footer">
                                <span class="huisje-price">€95 <small>/ nacht</small></span>
                                <a href="#" class="btn-book">Boek Nu</a>
                            </div>
                        </div>
                    </div>

                    <!-- Huisje 4 -->
                    <div class="huisje-card">
                        <div class="huisje-image-placeholder img-purple">
                            <span class="placeholder-tag">Heideboerderij</span>
                            <span class="placeholder-icon">🌾</span>
                        </div>
                        <div class="huisje-content">
                            <h3>Heidehut Ruinen</h3>
                            <p class="huisje-meta">📍 Drenthe | 👥 8 Pers. | 🛏️ 4 Slpk.</p>
                            <p class="huisje-description">Ruime en sfeervolle boerderij gelegen aan de rand van het Nationaal Park Dwingelderveld. Perfect voor grotere gezelschappen.</p>
                            <div class="huisje-footer">
                                <span class="huisje-price">€160 <small>/ nacht</small></span>
                                <a href="#" class="btn-book">Boek Nu</a>
                            </div>
                        </div>
                    </div>

                    <!-- Huisje 5 -->
                    <div class="huisje-card">
                        <div class="huisje-image-placeholder img-wellness">
                            <span class="placeholder-tag">Wellness</span>
                            <span class="placeholder-icon">🧖</span>
                        </div>
                        <div class="huisje-content">
                            <h3>Wellness Lodge Vijlen</h3>
                            <p class="huisje-meta">📍 Limburg | 👥 4 Pers. | 🛏️ 2 Slpk.</p>
                            <p class="huisje-description">Luxe lodge in het Limburgse heuvelland voorzien van een eigen jacuzzi, Finse sauna en een adembenemend uitzicht over de dalen.</p>
                            <div class="huisje-footer">
                                <span class="huisje-price">€180 <small>/ nacht</small></span>
                                <a href="#" class="btn-book">Boek Nu</a>
                            </div>
                        </div>
                    </div>

                    <!-- Huisje 6 -->
                    <div class="huisje-card">
                        <div class="huisje-image-placeholder img-beach">
                            <span class="placeholder-tag">Appartement</span>
                            <span class="placeholder-icon">🏢</span>
                        </div>
                        <div class="huisje-content">
                            <h3>Appartement Strandzicht</h3>
                            <p class="huisje-meta">📍 Scheveningen | 👥 2 Pers. | 🛏️ 1 Slpk.</p>
                            <p class="huisje-description">Modern en licht appartement direct aan de boulevard met panoramisch uitzicht over de Noordzee. Geniet van de frisse zeewind.</p>
                            <div class="huisje-footer">
                                <span class="huisje-price">€130 <small>/ nacht</small></span>
                                <a href="#" class="btn-book">Boek Nu</a>
                            </div>
                        </div>
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