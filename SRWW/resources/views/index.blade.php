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
                <li><a href="/" class="active">Home</a></li>
                <li><a href="#huisjes">Huisjes</a></li>
                <li><a href="#">Informatie</a></li>
                <li><a href="/loting">Loting</a></li>
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
                    <div class="huisje-card" 
                         data-id="1" 
                         data-title="Bosvilla De Zwijger"
                         data-location="Veluwe"
                         data-guests="6"
                         data-bedrooms="3"
                         data-tag="Bosvilla"
                         data-icon="🏡"
                         data-class="img-forest"
                         data-short-description="Een prachtige, moderne bosvilla met een grote privétuin, sauna en een sfeervolle open haard. Ideaal voor natuurliefhebbers."
                         data-long-description="Bosvilla De Zwijger biedt de ultieme rustzoeker een oase van luxe. Gelegen in de dichte bossen van de Veluwe, geniet u hier van eekhoorntjes in de tuin en de geur van dennenbomen. Na een lange boswandeling kunt u heerlijk opwarmen in uw eigen Finse sauna of gezellig samenkomen rond de sfeervolle open haard."
                         data-amenities="Finse Sauna, Sfeervolle Open Haard, Grote Privétuin, Huisdieren Toegestaan, Gratis High-speed Wi-Fi, Volledig Uitgeruste Keuken, Eigen Parkeergelegenheid, BBQ & Buitenkeuken">
                        <div class="huisje-image-placeholder img-forest">
                            <span class="placeholder-tag">Bosvilla</span>
                            <span class="placeholder-icon">🏡</span>
                        </div>
                        <div class="huisje-content">
                            <h3>Bosvilla De Zwijger</h3>
                            <p class="huisje-meta">📍 Veluwe | 👥 6 Pers. | 🛏️ 3 Slpk.</p>
                            <p class="huisje-description">Een prachtige, moderne bosvilla met een grote privétuin, sauna en een sfeervolle open haard. Ideaal voor natuurliefhebbers.</p>
                            <div class="huisje-footer">
                                <span class="huisje-more-info">Meer informatie &rarr;</span>
                            </div>
                        </div>
                    </div>

                    <!-- Huisje 2 -->
                    <div class="huisje-card"
                         data-id="2"
                         data-title="Duinhuisje Zandvoort"
                         data-location="Zandvoort"
                         data-guests="4"
                         data-bedrooms="2"
                         data-tag="Duinhuis"
                         data-icon="🏖️"
                         data-class="img-beach"
                         data-short-description="Stijlvol duinhuis op slechts 5 minuten lopen van het strand. Geniet van de zonsondergang vanaf uw ruime privéterras."
                         data-long-description="Dit stijlvolle, moderne duinhuisje ligt verscholen in de duinen van Zandvoort, op steenworp afstand van de brede zandstranden. Vanaf uw ruime privéterras geniet u van adembenemende zonsondergangen. Het huisje is van alle gemakken voorzien en inclusief twee leenfietsen om de omgeving te verkennen."
                         data-amenities="5min van het Strand, Ruim Privéterras, Luxe Regendouche, 2 Fietsen Inbegrepen, Vaatwasser & Oven, Smart TV met Netflix, Nespresso Machine, Gratis Wi-Fi">
                        <div class="huisje-image-placeholder img-beach">
                            <span class="placeholder-tag">Duinhuis</span>
                            <span class="placeholder-icon">🏖️</span>
                        </div>
                        <div class="huisje-content">
                            <h3>Duinhuisje Zandvoort</h3>
                            <p class="huisje-meta">📍 Zandvoort | 👥 4 Pers. | 🛏️ 2 Slpk.</p>
                            <p class="huisje-description">Stijlvol duinhuis op slechts 5 minuten lopen van het strand. Geniet van de zonsondergang vanaf uw ruime privéterras.</p>
                            <div class="huisje-footer">
                                <span class="huisje-more-info">Meer informatie &rarr;</span>
                            </div>
                        </div>
                    </div>

                    <!-- Huisje 3 -->
                    <div class="huisje-card"
                         data-id="3"
                         data-title="Chalet Alpenrust"
                         data-location="Giethoorn"
                         data-guests="2"
                         data-bedrooms="1"
                         data-tag="Lakeside"
                         data-icon="🚣"
                         data-class="img-lake"
                         data-short-description="Romantisch chalet direct aan het water met een eigen aanlegsteiger en bootverhuur. De perfecte plek voor een ontspannen weekendje weg."
                         data-long-description="Chalet Alpenrust is een romantisch toevluchtsoord voor twee personen, direct gelegen aan de schilderachtige grachten van Giethoorn. Met uw eigen elektrische fluisterboot (inbegrepen bij het verblijf) vaart u zo vanaf uw privesteiger de Bovenwijde op. Een knusse en onvergetelijke ervaring."
                         data-amenities="Direct aan het Water, Elektrische Boat Inbegrepen, Privé Aanlegsteiger, Gezellige Houtkachel, Zonnig Terras, Paddleboards (SUP), Koffiecorner, Gratis Wi-Fi">
                        <div class="huisje-image-placeholder img-lake">
                            <span class="placeholder-tag">Lakeside</span>
                            <span class="placeholder-icon">🚣</span>
                        </div>
                        <div class="huisje-content">
                            <h3>Chalet Alpenrust</h3>
                            <p class="huisje-meta">📍 Giethoorn | 👥 2 Pers. | 🛏️ 1 Slpk.</p>
                            <p class="huisje-description">Romantisch chalet direct aan het water met een eigen aanlegsteiger en bootverhuur. De perfecte plek voor een ontspannen weekendje weg.</p>
                            <div class="huisje-footer">
                                <span class="huisje-more-info">Meer informatie &rarr;</span>
                            </div>
                        </div>
                    </div>

                    <!-- Huisje 4 -->
                    <div class="huisje-card"
                         data-id="4"
                         data-title="Heidehut Ruinen"
                         data-location="Drenthe"
                         data-guests="8"
                         data-bedrooms="4"
                         data-tag="Heideboerderij"
                         data-icon="🌾"
                         data-class="img-purple"
                         data-short-description="Ruime en sfeervolle boerderij gelegen aan de rand van het Nationaal Park Dwingelderveld. Perfect voor grotere gezelschappen."
                         data-long-description="De Heidehut Ruinen is een ruime, sfeervolle Drentse heideboerderij aan de rand van Nationaal Park Dwingelderveld. Ideaal voor grotere gezinnen of vriendengroepen. Ontspan samen in de houtgestookte hot tub in de tuin, terwijl de kinderen spelen op het grasveld, of organiseer een gezellige BBQ-avond."
                         data-amenities="Houtgestookte Hot Tub, Grote Omheinde Tuin, Kinderspeeltoestellen, Grote Eettafel (8p), Wasmachine & Droger, Houtskool BBQ, Fietsenberging, Huisdieren Welkom">
                        <div class="huisje-image-placeholder img-purple">
                            <span class="placeholder-tag">Heideboerderij</span>
                            <span class="placeholder-icon">🌾</span>
                        </div>
                        <div class="huisje-content">
                            <h3>Heidehut Ruinen</h3>
                            <p class="huisje-meta">📍 Drenthe | 👥 8 Pers. | 🛏️ 4 Slpk.</p>
                            <p class="huisje-description">Ruime en sfeervolle boerderij gelegen aan de rand van het Nationaal Park Dwingelderveld. Perfect voor grotere gezelschappen.</p>
                            <div class="huisje-footer">
                                <span class="huisje-more-info">Meer informatie &rarr;</span>
                            </div>
                        </div>
                    </div>

                    <!-- Huisje 5 -->
                    <div class="huisje-card"
                         data-id="5"
                         data-title="Wellness Lodge Vijlen"
                         data-location="Limburg"
                         data-guests="4"
                         data-bedrooms="2"
                         data-tag="Wellness"
                         data-icon="🧖"
                         data-class="img-wellness"
                         data-short-description="Luxe lodge in het Limburgse heuvelland voorzien van een eigen jacuzzi, Finse sauna en een adembenemend uitzicht over de dalen."
                         data-long-description="De Wellness Lodge in het Limburgse Vijlen biedt u een ongeëvenaard 5-sterren wellnessgevoel. Gelegen op een heuveltop geniet u vanuit de jacuzzi van een adembenemend, panoramisch uitzicht over de glooiende Limburgse dalen. Binnen treft u een Finse sauna, luxe regendouche en een modern design interieur."
                         data-amenities="Buiten Jacuzzi, Traditionele Finse Sauna, Panoramisch Uitzicht, Luxe Regendouche, Airconditioning, Volledig Ingerichte Keuken, Design Gashaard, Sun Deck">
                        <div class="huisje-image-placeholder img-wellness">
                            <span class="placeholder-tag">Wellness</span>
                            <span class="placeholder-icon">🧖</span>
                        </div>
                        <div class="huisje-content">
                            <h3>Wellness Lodge Vijlen</h3>
                            <p class="huisje-meta">📍 Limburg | 👥 4 Pers. | 🛏️ 2 Slpk.</p>
                            <p class="huisje-description">Luxe lodge in het Limburgse heuvelland voorzien van een eigen jacuzzi, Finse sauna en een adembenemend uitzicht over de dalen.</p>
                            <div class="huisje-footer">
                                <span class="huisje-more-info">Meer informatie &rarr;</span>
                            </div>
                        </div>
                    </div>

                    <!-- Huisje 6 -->
                    <div class="huisje-card"
                         data-id="6"
                         data-title="Appartement Strandzicht"
                         data-location="Scheveningen"
                         data-guests="2"
                         data-bedrooms="1"
                         data-tag="Appartement"
                         data-icon="🏢"
                         data-class="img-beach"
                         data-short-description="Modern en licht appartement direct aan de boulevard met panoramisch uitzicht over de Noordzee. Geniet van de frisse zeewind."
                         data-long-description="Appartement Strandzicht is een modern en buitengewoon licht appartement op de bovenste etage, direct gelegen aan de levendige boulevard van Scheveningen. Door de kamerhoge ramen en vanaf het ruime balkon heeft u een spectaculair panoramisch uitzicht over de Noordzee en het strand."
                         data-amenities="Panoramisch Zeezicht, Ruim Balkon, Direct aan de Boulevard, Eigen Parkeerplaats, Lift Aanwezig, Vloerverwarming, High-speed Wi-Fi, Smart Home System">
                        <div class="huisje-image-placeholder img-beach">
                            <span class="placeholder-tag">Appartement</span>
                            <span class="placeholder-icon">🏢</span>
                        </div>
                        <div class="huisje-content">
                            <h3>Appartement Strandzicht</h3>
                            <p class="huisje-meta">📍 Scheveningen | 👥 2 Pers. | 🛏️ 1 Slpk.</p>
                            <p class="huisje-description">Modern en licht appartement direct aan de boulevard met panoramisch uitzicht over de Noordzee. Geniet van de frisse zeewind.</p>
                            <div class="huisje-footer">
                                <span class="huisje-more-info">Meer informatie &rarr;</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal Overlay -->
    <div id="huisje-modal" class="modal-overlay" aria-hidden="true" role="dialog">
        <div class="modal-container">
            <button class="modal-close" aria-label="Sluit pop-up">&times;</button>
            <div class="modal-body-layout">
                <!-- Left panel: Visual Header / Accent area -->
                <div class="modal-visual-panel">
                    <span class="modal-visual-tag"></span>
                    <span class="modal-visual-icon"></span>
                </div>
                <!-- Right panel: Rich Details -->
                <div class="modal-details-panel">
                    <h2 class="modal-title"></h2>
                    <p class="modal-meta"></p>
                    
                    <div class="modal-divider"></div>
                    
                    <div class="modal-description-section">
                        <h3>Over het huisje</h3>
                        <p class="modal-long-description"></p>
                    </div>
                    
                    <div class="modal-amenities-section">
                        <h3>Voorzieningen & Details</h3>
                        <ul class="modal-amenities-list"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Vakantie Huisjes. Alle rechten voorbehouden.</p>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('huisje-modal');
        const closeBtn = modal.querySelector('.modal-close');
        const cards = document.querySelectorAll('.huisje-card');

        // Modal elements to populate
        const visualPanel = modal.querySelector('.modal-visual-panel');
        const visualIcon = modal.querySelector('.modal-visual-icon');
        const visualTag = modal.querySelector('.modal-visual-tag');
        const titleEl = modal.querySelector('.modal-title');
        const metaEl = modal.querySelector('.modal-meta');
        const longDescEl = modal.querySelector('.modal-long-description');
        const amenitiesList = modal.querySelector('.modal-amenities-list');

        const openModal = (card) => {
            // Extract data
            const title = card.getAttribute('data-title');
            const location = card.getAttribute('data-location');
            const guests = card.getAttribute('data-guests');
            const bedrooms = card.getAttribute('data-bedrooms');
            const tag = card.getAttribute('data-tag');
            const icon = card.getAttribute('data-icon');
            const themeClass = card.getAttribute('data-class');
            const longDesc = card.getAttribute('data-long-description');
            const amenities = card.getAttribute('data-amenities').split(',').map(a => a.trim());

            // Populate modal data
            titleEl.textContent = title;
            metaEl.innerHTML = `📍 ${location} &nbsp;&bull;&nbsp; 👥 ${guests} Pers. &nbsp;&bull;&nbsp; 🛏️ ${bedrooms} Slpk.`;
            longDescEl.textContent = longDesc;
            
            // Reset classes and add current theme class
            visualPanel.className = 'modal-visual-panel';
            visualPanel.classList.add(themeClass);
            visualIcon.textContent = icon;
            visualTag.textContent = tag;

            // Render amenities list
            amenitiesList.innerHTML = '';
            amenities.forEach(amenity => {
                const li = document.createElement('li');
                li.innerHTML = `<span class="amenity-bullet">✓</span> ${amenity}`;
                amenitiesList.appendChild(li);
            });

            // Open modal with smooth transition
            modal.classList.add('active');
            document.body.style.overflow = 'hidden'; // prevent background scrolling
            modal.setAttribute('aria-hidden', 'false');
            
            // Focus close button for accessibility
            closeBtn.focus();
        };

        const closeModal = () => {
            modal.classList.remove('active');
            document.body.style.overflow = ''; // restore scrolling
            modal.setAttribute('aria-hidden', 'true');
        };

        // Attach click events to cottage cards
        cards.forEach(card => {
            card.addEventListener('click', () => openModal(card));
            
            // Key listener for interactive accessibility
            card.setAttribute('tabindex', '0');
            card.setAttribute('role', 'button');
            card.setAttribute('aria-label', `Bekijk details voor ${card.getAttribute('data-title')}`);
            card.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    openModal(card);
                }
            });
        });

        // Close on click close button
        closeBtn.addEventListener('click', closeModal);

        // Close on backdrop click
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });

        // Close on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                closeModal();
            }
        });
    });
    </script>
</body>
</html>