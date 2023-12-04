@extends('layouts.appNb')

@section('content')
    <div class="container">
        <h1>Úprava torty</h1>

        <form action="{{ route('torty.update', $torta->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="nazov" class="form-label">Názov</label>
                <input type="text" class="form-control" id="nazov" name="nazov" value="{{ $torta->nazov }}" required>
            </div>
            
            <div class="mb-3">
            <label for="typ" class="form-label">Typ</label>
            <select class="form-control" id="typ" name="typ">
                @foreach(\App\Models\TypTorty::all() as $typTorty)
                    <option value="{{ $typTorty->id }}">{{ $typTorty->typ }}</option>
                @endforeach
            </select>
            </div>

            <div class="mb-3">
                <label for="zakladne_zlozenie" class="form-label">Základné zloženie</label>
                <input type="text" class="form-control" id="zakladne_zlozenie" name="zakladne_zlozenie" value="{{ $torta->zakladne_zlozenie }}" required>
            </div>

            <div class="mb-3">
                <label for="cena" class="form-label">Cena</label>
                <input type="number" step="0.01" class="form-control" id="cena" name="cena" value="{{ $torta->cena }}" required>
            </div>

            <div class="mb-3">
                <label for="obrazok" class="form-label">Obrázok</label>
                <input type="file" class="form-control" id="obrazok" name="obrazok" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Uložiť zmeny</button>
        </form>
    </div>
@endsection
