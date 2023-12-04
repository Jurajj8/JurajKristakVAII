@extends('layouts.appNb')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Bočné menu -->
            <div class="col-md-3">
                <div class="list-group">
                <a href="{{ route('profile.show') }}" class="list-group-item list-group-item-action">Profil</a>
                    <a href="{{ route('profile.torty') }}" class="list-group-item list-group-item-action">Torty</a>
                    <a href="{{ route('profile.create') }}" class="list-group-item list-group-item-action">Pridať tortu</a>
                </div>
            </div>

            <!-- Obsah stránky -->
            <div class="col-md-9">
               <h1>Môj profil</h1>
               <p>Meno: {{ Auth::user()->name }}</p>
               <p>Email: {{ Auth::user()->email }}</p>

               <h2>Změna hesla</h2>
               <form method="POST" action="{{ route('profile.updatePassword') }}">
                   @csrf
                   @method('PATCH')

                   <div class="mb-3">
                       <label for="current_password" class="form-label">Aktuálne heslo</label>
                       <input type="password" class="form-control" id="current_password" name="current_password" required>
                   </div>

                   <div class="mb-3">
                       <label for="new_password" class="form-label">Nové heslo</label>
                       <input type="password" class="form-control" id="new_password" name="new_password" required pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$" title="Heslo musí byť dlhé aspoň 8 znakov, mať jedno veľke písmeno a jednu číslicu.">
                   </div>

                   <div class="mb-3">
                       <label for="new_password_confirmation" class="form-label">Potvrdiť nové heslo</label>
                       <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$" title="Heslo musí byť dlhé aspoň 8 znakov, mať jedno veľke písmeno a jednu číslicu.">
                   </div>

                   <button type="submit" class="btn btn-primary">Uložiť heslo</button>
               </form>
            </div>
        </div>
    </div>
@endsection
