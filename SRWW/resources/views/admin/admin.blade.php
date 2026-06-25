@extends('layout')

@section('content')
<head>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
            <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
    <main class="main-content">
        <section class="admin-section">
            <div class="section-container">
                <h2>Admin Panel</h2>
                <p>Welkom in het beheerderspaneel.</p>
            </div>
        </section>
        <section class="grid-admin">
            <div>
                <h2>Loting</h2>
                @auth
                    @if(Auth::user()->is_admin)
                        <a href="{{ route('admin.export.inschrijvingen') }}" class="admin-button">📊 Export Inschrijvingen</a>
                    @endif
                <h2>USERS CRUD</h2>
                 @auth
                    <a href="{{ route('admin.cms.index') }}" class="admin-button">⚙️ Naar CMS</a>
                @else
                    <a href="{{ route('users.index') }}" class="admin-button">⚙️ Naar CRUD USERS</a>
                @endauth
        </div>
            <div>
                <h2>Huisjesbeheer</h2>
                @auth
                    <a href="{{ route('admin.cms.index') }}" class="admin-button">⚙️ Naar CMS</a>
                @else
                    <a href="{{ route('admin.cms.index') }}" class="admin-button">⚙️ Naar CMS</a>
                @endauth
        </div>
        
        </section>
    </main>
@endsection
