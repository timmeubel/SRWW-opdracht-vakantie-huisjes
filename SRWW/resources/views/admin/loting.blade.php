@extends('layout')

@section('content')
<main class="main-content">
    <section class="admin-section">
        <div class="section-container">
            <h2>📊 Loting Beheer</h2>
            
            <div style="margin-top: 30px;">
                <h3>Inschrijvingen ({{ $inschrijvingen->count() }})</h3>
                
                @if($inschrijvingen->isEmpty())
                    <p>Nog geen inschrijvingen.</p>
                @else
                    <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
                        <thead>
                            <tr style="background: #f5f5f5;">
                                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">ID</th>
                                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Naam</th>
                                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">1e Voorkeur</th>
                                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">2e Voorkeur</th>
                                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">3e Voorkeur</th>
                                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Startdatum</th>
                                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Einddatum</th>
                                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Loting</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inschrijvingen as $inschrijving)
                                <tr>
                                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $inschrijving->id }}</td>
                                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $inschrijving->naam }}</td>
                                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $inschrijving->voorkeur_1 }}</td>
                                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $inschrijving->voorkeur_2 }}</td>
                                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $inschrijving->voorkeur_3 }}</td>
                                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $inschrijving->week_voorkeur_start }}</td>
                                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $inschrijving->week_voorkeur_eind }}</td>
                                    <td style="border: 1px solid #ddd; padding: 10px;">
                                        @if($inschrijving->loting)
                                            {{ $inschrijving->loting->moment ?? 'N/A' }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <div style="margin-top: 40px;">
                <h3>Lotingen ({{ $lotingen->count() }})</h3>
                <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
                    <thead>
                        <tr style="background: #f5f5f5;">
                            <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">ID</th>
                            <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Moment</th>
                            <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Winnaar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lotingen as $loting)
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 10px;">{{ $loting->id }}</td>
                                <td style="border: 1px solid #ddd; padding: 10px;">{{ $loting->moment }}</td>
                                <td style="border: 1px solid #ddd; padding: 10px;">{{ $loting->winnaar ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 40px;">
                <h3>Inschrijfrondes ({{ $inschrijfronden->count() }})</h3>
                <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
                    <thead>
                        <tr style="background: #f5f5f5;">
                            <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">ID</th>
                            <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Begin</th>
                            <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Eind</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inschrijfronden as $ronde)
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 10px;">{{ $ronde->id }}</td>
                                <td style="border: 1px solid #ddd; padding: 10px;">{{ $ronde->begin_datum }}</td>
                                <td style="border: 1px solid #ddd; padding: 10px;">{{ $ronde->eind_datum }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
@endsection
