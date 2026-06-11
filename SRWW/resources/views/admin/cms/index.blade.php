@extends('layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/cms.css') }}">

<div class="cms-dashboard">
    
    <div class="cms-header">
        <h2>🛠️ SRWW Website Beheer (CMS)</h2>
        <a href="/" class="btn-view-site">Bekijk Website &rarr;</a>
    </div>

    {{-- Succes Melding Alert --}}
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="cms-navigation">
        <label for="cmsSectionSelect" class="cms-nav-label">Kies wat u wilt beheren:</label>
        <select id="cmsSectionSelect" class="cms-dropdown">
            <option value="index-page">🏠 Algemene Index Pagina Informatie</option>
            <option value="houses-list">🏡 Vakantiehuisjes Aanpassen / Bekijken</option>
            <option value="add-house">➕ Nieuw Vakantiehuisje Toevoegen</option>
        </select>
    </div>

    <div id="section-index-page" class="cms-section cms-section-index active">
        <h3 style="margin-top: 0; color: #2d3748; border-bottom: 1px solid #e2e8f0; padding-bottom: 10px;">🏠 Index Pagina Informatie Aanpassen</h3>
        
        <form action="{{ route('admin.cms.settings.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Hoofdtitel (Welcome Title)</label>
                <input type="text" name="welcome_title" value="{{ $settings['welcome_title'] ?? '🏠 Welkom bij de SRWW' }}" class="form-control">
            </div>

            <div class="form-group">
                <label>Introductie Tekst (Lead Text)</label>
                <textarea name="welcome_text" rows="3" class="form-control">{{ $settings['welcome_text'] ?? '' }}</textarea>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label>Sectie Titel Huisjes</label>
                    <input type="text" name="houses_section_title" value="{{ $settings['houses_section_title'] ?? 'Onze Vakantiehuisjes' }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Sectie Ondertitel</label>
                    <input type="text" name="houses_section_subtitle" value="{{ $settings['houses_section_subtitle'] ?? 'Kies uit ons exclusieve aanbod van vakantiewoningen' }}" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn-submit-blue">Wijzigingen Opslaan</button>
        </form>
    </div>

    <div id="section-houses-list" class="cms-section">
        <h3 style="color: #2d3748; margin-bottom: 20px;">🏡 Bestaande Vakantiehuisjes Aanpassen</h3>
        
        @if($houses->isEmpty())
            <p style="background: #edf2f7; padding: 15px; border-radius: 6px;">Er zijn momenteel geen huisjes gevonden. Gebruik de seeder of voeg een nieuw huisje toe!</p>
        @else
            @foreach($houses as $house)
                <div class="house-card">
                    <h4 style="margin-top: 0; color: #2b6cb0; font-size: 1.2rem; margin-bottom: 15px;">Huisje #{{ $house->id }}: {{ $house->name }}</h4>
                    
                    <form action="{{ route('admin.cms.house.update', $house->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-grid-4">
                            <div class="form-group">
                                <label>Naam van het huisje</label>
                                <input type="text" name="name" value="{{ $house->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Locatie</label>
                                <input type="text" name="location" value="{{ $house->location }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Personen</label>
                                <input type="number" name="guests" value="{{ $house->guests }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Slaapkamers</label>
                                <input type="number" name="bedrooms" value="{{ $house->bedrooms }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Korte Omschrijving (Kaartweergave)</label>
                            <input type="text" name="short_description" value="{{ $house->short_description }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Lange Omschrijving (Pop-up Modal)</label>
                            <textarea name="long_description" rows="4" class="form-control">{{ $house->long_description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Voorzieningen (Gescheiden met een komma)</label>
                            <input type="text" name="amenities" value="{{ $house->amenities }}" class="form-control" placeholder="Sauna, Wifi, Jacuzzi">
                        </div>

                        <div class="image-upload-box">
                            <label style="display:block; font-weight:bold; margin-bottom: 5px; font-size: 0.9rem;">📷 Huisje Foto Wijzigen</label>
                            <input type="file" name="image" accept="image/*">
                            @if($house->image_path)
                                <div style="margin-top: 10px;">
                                    <span style="font-size: 0.8rem; display:block; margin-bottom:3px;">Huidige live foto:</span>
                                    <img src="{{ asset('storage/' . $house->image_path) }}" style="height: 60px; border-radius:4px; border: 1px solid #cbd5e0;">
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn-submit-green">Huisje {{ $house->id }} Bijwerken</button>
                    </form>

                    {{-- Delete photo form (separate from update form, posts to /admin/cms/delete-image) --}}
                    @if($house->image_path)
                        <form action="{{ route('admin.cms.house.image.delete') }}" method="POST"
                              style="margin-top: 10px;"
                              onsubmit="return confirm('Weet u zeker dat u de foto wilt verwijderen?')">
                            @csrf
                            <input type="hidden" name="house_id" value="{{ $house->id }}">
                            <button type="submit" style="background:#e53e3e; color:#fff; border:none; padding:6px 14px; border-radius:4px; font-size:0.85rem; cursor:pointer;">
                                🗑️ Foto Verwijderen
                            </button>
                        </form>
                    @endif

                    {{-- Delete entire house form --}}
                    <form action="{{ route('admin.cms.house.delete') }}" method="POST"
                          style="margin-top: 15px; border-top: 1px solid #fed7d7; padding-top: 15px;"
                          onsubmit="return confirm('⚠️ Weet u zeker dat u huisje #{{ $house->id }} ({{ $house->name }}) permanent wilt verwijderen? Dit kan niet ongedaan worden gemaakt!')">
                        @csrf
                        <input type="hidden" name="house_id" value="{{ $house->id }}">
                        <button type="submit" style="background:#742a2a; color:#fff; border:none; padding:8px 18px; border-radius:4px; font-size:0.85rem; cursor:pointer; font-weight:bold;">
                            🗑️ Volledig Huisje Verwijderen
                        </button>
                    </form>
                </div>
            @endforeach
        @endif
    </div>

    <div id="section-add-house" class="cms-section cms-section-add-house">
        <h3 style="margin-top: 0; color: #dd6b20; border-bottom: 1px solid #feebc8; padding-bottom: 10px;">➕ Nieuw Vakantiehuisje Toevoegen</h3>
        
        <form action="{{ route('admin.cms.house.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-grid-4">
                <div class="form-group">
                    <label>Naam van het huisje</label>
                    <input type="text" name="name" required placeholder="Bijv. Bosvilla De Specht" class="form-control">
                </div>
                <div class="form-group">
                    <label>Locatie</label>
                    <input type="text" name="location" required placeholder="Bijv. Texel" class="form-control">
                </div>
                <div class="form-group">
                    <label>Personen</label>
                    <input type="number" name="guests" required min="1" placeholder="4" class="form-control">
                </div>
                <div class="form-group">
                    <label>Slaapkamers</label>
                    <input type="number" name="bedrooms" required min="1" placeholder="2" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label>Korte Omschrijving (Kaartweergave)</label>
                <input type="text" name="short_description" required placeholder="Een korte, pakkende tekst voor op de homepage..." class="form-control">
            </div>

            <div class="form-group">
                <label>Lange Omschrijving (Pop-up Modal)</label>
                <textarea name="long_description" rows="3" required placeholder="Uitgebreide informatie over de ligging, indeling en sfeer..." class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Voorzieningen (Gescheiden met een komma)</label>
                <input type="text" name="amenities" placeholder="Bijv. Wifi, Grote tuin, Huisdieren toegestaan" class="form-control">
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label>📷 Foto Selecteren</label>
                <input type="file" name="image" accept="image/*">
            </div>

            <button type="submit" class="btn-submit-orange">Huisje Opslaan en Aanmaken</button>
        </form>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropdown = document.getElementById('cmsSectionSelect');
    const sections = document.querySelectorAll('.cms-section');

    dropdown.addEventListener('change', function() {
        const selectedValue = this.value;

        // Loop door alle secties heen en verberg ze
        sections.forEach(section => {
            section.classList.remove('active');
        });

        // Toon de geselecteerde sectie
        const activeSection = document.getElementById('section-' + selectedValue);
        if (activeSection) {
            activeSection.classList.add('active');
        }
    });
});
</script>
@endsection