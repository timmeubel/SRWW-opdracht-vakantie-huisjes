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
                        {{-- Foto's JSON array voor gallerij --}}
                        @php
                            $photoUrls = $house->fotos->map(function($foto) { 
                                return asset('storage/' . $foto->url); 
                            })->toArray();
                            $photosJson = json_encode($photoUrls);
                        @endphp
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
                             data-amenities="{{ $house->amenities }}"
                             data-image="{{ $house->image_path ? asset('storage/' . $house->image_path) : '' }}"
                             data-photos='{!! $photosJson !!}'
                             data-pdf="{{ $house->pdf_path ? asset('storage/' . $house->pdf_path) : '' }}">
                             
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

    <!-- Modal Overlay -->
    <div id="huisje-modal" class="modal-overlay" aria-hidden="true" role="dialog">
        <div class="modal-container">
            <button class="modal-close" aria-label="Sluit pop-up">&times;</button>
            <div class="modal-body-layout">
                <div class="modal-header-section">
                    <h2 class="modal-title"></h2>
                    <p class="modal-meta"></p>
                </div>
                
                <!-- Image / Visual Panel with Gallery -->
                <div class="modal-visual-panel">
                    <span class="modal-visual-tag"></span>
                    <span class="modal-visual-icon"></span>
                    
                    <!-- Gallery Navigation -->
                    <div class="modal-gallery-nav" style="display: none;">
                        <button class="gallery-arrow gallery-prev" aria-label="Vorige foto">◀</button>
                        <button class="gallery-arrow gallery-next" aria-label="Volgende foto">▶</button>
                        <div class="gallery-counter"><span class="current-photo">1</span> / <span class="total-photos">1</span></div>
                    </div>
                </div>
                
                <!-- Thumbnails -->
                <div class="gallery-thumbnails" style="display: none;">
                </div>
                
                <!-- Amenities / Voorzieningen -->
                <div class="modal-amenities-section" style="margin-top: 15px;">
                    <h3>Voorzieningen & Details</h3>
                    <ul class="modal-amenities-list"></ul>
                </div>

                <!-- Description -->
                <div class="modal-description-section" style="margin-top: 15px;">
                    <h3>Beschrijving</h3>
                    <p class="modal-long-description"></p>
                </div>

                <div class="modal-pdf-section" style="margin-top: 20px; display: none;">
                    <a href="#" class="modal-pdf-button" target="_blank" style="display: inline-block; background: #2b6cb0; color: white; padding: 10px 16px; border-radius: 4px; text-decoration: none; font-weight: bold; font-size: 0.95rem;">
                        📄 PDF Openen
                    </a>
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

        // Gallery elements
        const galleryNav = modal.querySelector('.modal-gallery-nav');
        const prevBtn = modal.querySelector('.gallery-prev');
        const nextBtn = modal.querySelector('.gallery-next');
        const currentPhotoSpan = modal.querySelector('.current-photo');
        const totalPhotosSpan = modal.querySelector('.total-photos');
        const thumbnailsContainer = modal.querySelector('.gallery-thumbnails');

        let currentPhotoIndex = 0;
        let photos = [];

        const updateGallery = () => {
            if (photos.length === 0) return;

            // Update main image
            visualPanel.style.backgroundImage = `url('${photos[currentPhotoIndex]}')`;
            visualPanel.style.backgroundSize = 'cover';
            visualPanel.style.backgroundPosition = 'center';
            visualIcon.style.display = 'none';

            // Update counter
            currentPhotoSpan.textContent = currentPhotoIndex + 1;
            totalPhotosSpan.textContent = photos.length;

            // Update thumbnails highlight
            document.querySelectorAll('.gallery-thumbnail').forEach((thumb, idx) => {
                thumb.classList.toggle('active', idx === currentPhotoIndex);
            });
        };

        const showNextPhoto = () => {
            if (photos.length > 0) {
                currentPhotoIndex = (currentPhotoIndex + 1) % photos.length;
                updateGallery();
            }
        };

        const showPrevPhoto = () => {
            if (photos.length > 0) {
                currentPhotoIndex = (currentPhotoIndex - 1 + photos.length) % photos.length;
                updateGallery();
            }
        };

        const openModal = (card) => {
            const title = card.getAttribute('data-title');
            const location = card.getAttribute('data-location');
            const guests = card.getAttribute('data-guests');
            const bedrooms = card.getAttribute('data-bedrooms');
            const tag = card.getAttribute('data-tag');
            const icon = card.getAttribute('data-icon');
            const themeClass = card.getAttribute('data-class');
            const longDesc = card.getAttribute('data-long-description');
            const image = card.getAttribute('data-image');
            const pdf = card.getAttribute('data-pdf');
            const photosJson = card.getAttribute('data-photos');
            
            // Parse photos from JSON
            try {
                photos = photosJson ? JSON.parse(photosJson) : [];
            } catch (e) {
                photos = [];
            }

            // Add primary image if it exists
            if (image && !photos.includes(image)) {
                photos.unshift(image);
            }

            currentPhotoIndex = 0;
            
            // Safe split mapping if amenities string exists
            const rawAmenities = card.getAttribute('data-amenities');
            const amenities = rawAmenities ? rawAmenities.split(',').map(a => a.trim()) : [];

            titleEl.textContent = title;
            metaEl.innerHTML = `📍 ${location} &nbsp;&bull;&nbsp; 👥 ${guests} Pers. &nbsp;&bull;&nbsp; 🛏️ ${bedrooms} Slpk.`;
            longDescEl.textContent = longDesc;
            
            visualPanel.className = 'modal-visual-panel';
            visualIcon.textContent = icon;
            visualTag.textContent = tag;

            // Show/hide gallery navigation
            if (photos.length > 1) {
                galleryNav.style.display = 'block';
                updateGallery();
            } else if (photos.length === 1) {
                galleryNav.style.display = 'none';
                visualPanel.style.backgroundImage = `url('${photos[0]}')`;
                visualPanel.style.backgroundSize = 'cover';
                visualPanel.style.backgroundPosition = 'center';
                visualIcon.style.display = 'none';
            } else {
                galleryNav.style.display = 'none';
                visualPanel.style.backgroundImage = '';
                visualIcon.style.display = 'block';
                if(themeClass) {
                    visualPanel.classList.add(themeClass);
                }
            }

            // Create thumbnails
            thumbnailsContainer.innerHTML = '';
            if (photos.length > 1) {
                thumbnailsContainer.style.display = 'flex';
                photos.forEach((photoUrl, idx) => {
                    const thumb = document.createElement('img');
                    thumb.src = photoUrl;
                    thumb.alt = `Foto ${idx + 1}`;
                    thumb.className = 'gallery-thumbnail' + (idx === 0 ? ' active' : '');
                    thumb.style.width = '60px';
                    thumb.style.height = '60px';
                    thumb.style.objectFit = 'cover';
                    thumb.style.borderRadius = '4px';
                    thumb.style.cursor = 'pointer';
                    thumb.style.border = '2px solid transparent';
                    thumb.style.transition = 'border-color 0.3s';
                    thumb.addEventListener('click', () => {
                        currentPhotoIndex = idx;
                        updateGallery();
                    });
                    thumbnailsContainer.appendChild(thumb);
                });
            } else {
                thumbnailsContainer.style.display = 'none';
            }

            amenitiesList.innerHTML = '';
            amenities.forEach(amenity => {
                if(amenity) {
                    const li = document.createElement('li');
                    li.innerHTML = `<span class="amenity-bullet">✓</span> ${amenity}`;
                    amenitiesList.appendChild(li);
                }
            });

            // Handle PDF button
            const pdfSection = modal.querySelector('.modal-pdf-section');
            const pdfButton = modal.querySelector('.modal-pdf-button');
            if (pdf) {
                pdfButton.href = pdf;
                pdfSection.style.display = 'block';
            } else {
                pdfSection.style.display = 'none';
            }

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

        // Gallery button listeners
        nextBtn.addEventListener('click', showNextPhoto);
        prevBtn.addEventListener('click', showPrevPhoto);

        // Keyboard navigation for gallery
        document.addEventListener('keydown', (e) => {
            if (modal.classList.contains('active')) {
                if (e.key === 'ArrowRight') showNextPhoto();
                if (e.key === 'ArrowLeft') showPrevPhoto();
            }
        });

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