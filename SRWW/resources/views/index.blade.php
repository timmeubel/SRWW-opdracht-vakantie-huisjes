@extends('layout')

@section('content')
    <main class="main-content">
        <!-- Hero / Informatie Section -->
        <section class="info-section">
            <div class="section-container">
                {{-- Fallbacks are added using ?? so the site won't break if the database settings are empty --}}
                <h1>{{ $settings['welcome_title'] ?? '🏠 Welkom bij de SRWW' }}</h1>
                <p class="lead-text">{{ $settings['welcome_text'] ?? 'Hier kunt u als lid van de personeelsvereniging mee doen met de lotingen voor de huisjes die wij beschikbaar hebben door het jaar. En kunt u wat meer informatie over de verschillende huisjes vinden.' }}</p>
                
                <div class="info-features">
                    <div class="feature-card">
                        <span class="feature-icon">{{ $settings['feature_1_icon'] ?? '🌲' }}</span>
                        <h3>{{ $settings['feature_1_title'] ?? 'Prachtige Locaties' }}</h3>
                        <p>{{ $settings['feature_1_text'] ?? 'Al onze huisjes bevinden zich op unieke plekken, midden in de natuur of dicht bij populaire bezienswaardigheden.' }}</p>
                    </div>
                    <div class="feature-card">
                        <span class="feature-icon">{{ $settings['feature_2_icon'] ?? '✨' }}</span>
                        <h3>{{ $settings['feature_2_title'] ?? 'Luxe & Comfort' }}</h3>
                        <p>{{ $settings['feature_2_text'] ?? 'Geniet van moderne voorzieningen, comfortabele bedden, gratis Wi-Fi en een volledig uitgeruste keuken.' }}</p>
                    </div>
                    <div class="feature-card">
                        <span class="feature-icon">{{ $settings['feature_3_icon'] ?? '🛎️' }}</span>
                        <h3>{{ $settings['feature_3_title'] ?? 'Uitstekende Service' }}</h3>
                        <p>{{ $settings['feature_3_text'] ?? 'Onze gastvrijheid staat voorop. We staan altijd voor u klaar om uw verblijf onvergetelijk te maken.' }}</p>
                    </div>
                </div>
                
                <a href="#huisjes" class="cta-button">{{ $settings['cta_text'] ?? 'Bekijk Onze Huisjes' }}</a>
            </div>
        </section>

        <!-- Huisjes Section -->
        <section id="huisjes" class="huisjes-section">
            <div class="section-container">
                <h2>{{ $settings['houses_section_title'] ?? 'Onze Vakantiehuisjes' }}</h2>
                <p class="section-subtitle">{{ $settings['houses_section_subtitle'] ?? 'Kies uit ons exclusieve aanbod van vakantiewoningen' }}</p>
                
                <div class="huisjes-grid">
                    @foreach($houses as $house)
                        {{-- The data attributes are dynamically bound to your database properties --}}
                        <div class="huisje-card" 
                             data-id="{{ $house->id }}" 
                             data-title="{{ $house->name }}"
                             data-location="{{ $house->location }}"
                             data-guests="{{ $house->guests }}"
                             data-bedrooms="{{ $house->bedrooms }}"
                             data-tag="{{ $house->tag }}"
                             data-icon="{{ $house->icon }}"
                             data-class="{{ $house->class_theme }}"
                             data-short-description="{{ $house->short_description }}"
                             data-long-description="{{ $house->long_description }}"
                             data-amenities="{{ $house->amenities }}">
                             
                            {{-- Check if there is a custom image uploaded via CMS, otherwise fall back to the CSS class placeholder --}}
                            @if($house->image_path)
                                <div class="huisje-image" style="background-image: url('{{ asset('storage/' . $house->image_path) }}'); background-size: cover; background-position: center; height: 200px; position: relative;">
                                    <span class="placeholder-tag">{{ $house->tag }}</span>
                                </div>
                            @else
                                <div class="huisje-image-placeholder {{ $house->class_theme }}">
                                    <span class="placeholder-tag">{{ $house->tag }}</span>
                                    <span class="placeholder-icon">{{ $house->icon }}</span>
                                </div>
                            @endif

                            <div class="huisje-content">
                                <h3>{{ $house->name }}</h3>
                                <p class="huisje-meta">📍 {{ $house->location }} | 👥 {{ $house->guests }} Pers. | 🛏️ {{ $house->bedrooms }} Slpk.</p>
                                <p class="huisje-description">{{ $house->short_description }}</p>
                                <div class="huisje-footer">
                                    <span class="huisje-more-info">Meer informatie &rarr;</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <!-- Modal Overlay (Stays the same because the JavaScript handles dynamic population seamlessly) -->
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
@endsection

@section('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('huisje-modal');
        const closeBtn = modal.querySelector('.modal-close');
        const cards = document.querySelectorAll('.huisje-card');

        const visualPanel = modal.querySelector('.modal-visual-panel');
        const visualIcon = modal.querySelector('.modal-visual-icon');
        const visualTag = modal.querySelector('.modal-visual-tag');
        const titleEl = modal.querySelector('.modal-title');
        const metaEl = modal.querySelector('.modal-meta');
        const longDescEl = modal.querySelector('.modal-long-description');
        const amenitiesList = modal.querySelector('.modal-amenities-list');

        const openModal = (card) => {
            const title = card.getAttribute('data-title');
            const location = card.getAttribute('data-location');
            const guests = card.getAttribute('data-guests');
            const bedrooms = card.getAttribute('data-bedrooms');
            const tag = card.getAttribute('data-tag');
            const icon = card.getAttribute('data-icon');
            const themeClass = card.getAttribute('data-class');
            const longDesc = card.getAttribute('data-long-description');
            
            // Safe split mapping if amenities string exists
            const rawAmenities = card.getAttribute('data-amenities');
            const amenities = rawAmenities ? rawAmenities.split(',').map(a => a.trim()) : [];

            titleEl.textContent = title;
            metaEl.innerHTML = `📍 ${location} &nbsp;&bull;&nbsp; 👥 ${guests} Pers. &nbsp;&bull;&nbsp; 🛏️ ${bedrooms} Slpk.`;
            longDescEl.textContent = longDesc;
            
            visualPanel.className = 'modal-visual-panel';
            if(themeClass) {
                visualPanel.classList.add(themeClass);
            }
            visualIcon.textContent = icon;
            visualTag.textContent = tag;

            amenitiesList.innerHTML = '';
            amenities.forEach(amenity => {
                if(amenity) {
                    const li = document.createElement('li');
                    li.innerHTML = `<span class="amenity-bullet">✓</span> ${amenity}`;
                    amenitiesList.appendChild(li);
                }
            });

            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
            modal.setAttribute('aria-hidden', 'false');
            closeBtn.focus();
        };

        const closeModal = () => {
            modal.classList.remove('active');
            document.body.style.overflow = '';
            modal.setAttribute('aria-hidden', 'true');
        };

        cards.forEach(card => {
            card.addEventListener('click', () => openModal(card));
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

        closeBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.classList.contains('active')) closeModal();
        });
    });
    </script>
@endsection