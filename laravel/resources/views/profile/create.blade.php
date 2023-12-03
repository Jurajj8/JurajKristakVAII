@extends('layouts.appNb')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Boční menu -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ route('profile.show') }}" class="list-group-item list-group-item-action">Profil</a>
                    <a href="{{ route('profile.torty') }}" class="list-group-item list-group-item-action">Torty</a>
                    <a href="{{ route('profile.create') }}" class="list-group-item list-group-item-action">Pridať tortu</a>
                </div>
            </div>

            <!-- Obsah stránky -->
            <div class="col-md-9">
                <h1>Přidat dort</h1>
                <form action="{{ route('torty.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nazov" class="form-label">Název dortu</label>
                        <input type="text" class="form-control" id="nazov" name="nazov" required>
                    </div>

                    <div class="mb-3">
                    <label for="typ_id" class="form-label">Typ</label>
<select class="form-control" id="typ_id" name="typ_id">
    @foreach(\App\Models\TypTorty::all() as $typTorty)
        <option value="{{ $typTorty->id }}">{{ $typTorty->typ }}</option>
    @endforeach
</select>




                    </div>

                    <div class="mb-3">
                        <label for="zakladne_zlozenie" class="form-label">Základní složení</label>
                        <input type="text" class="form-control" id="zakladne_zlozenie" name="zakladne_zlozenie" required>
                    </div>

                    <div class="mb-3">
                        <label for="cena" class="form-label">Cena</label>
                        <input type="number" class="form-control" id="cena" name="cena" required step="0.01">
                    </div>

                    <div class="mb-3">
                        <label for="popis" class="form-label">Popis</label>
                        <textarea class="form-control" id="popis" name="popis" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="obrazok" class="form-label">Obrázek dortu</label>
                        <input type="file" class="form-control" id="obrazok" name="obrazok" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Přidat dort</button>
                </form>
                @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            </div>
        </div>
    </div>
@endsection
