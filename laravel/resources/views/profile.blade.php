<!-- resources/views/profile.blade.php -->

@extends('show')

@section('profil_content')
    <!-- Zobrazení existujících dortů pro přehled -->
    <h1>Profil uživatele</h1>

        <div>
            <strong>Jméno:</strong> {{ $user->name }}
        </div>
        <div>
            <strong>Email:</strong> {{ $user->email }}
        </div>
@endsection
