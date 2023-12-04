@extends('show')

@section('profil_content')
    <h1>Profil používateľa</h1>

        <div>
            <strong>Meno:</strong> {{ $user->name }}
        </div>
        <div>
            <strong>Email:</strong> {{ $user->email }}
        </div>
@endsection
