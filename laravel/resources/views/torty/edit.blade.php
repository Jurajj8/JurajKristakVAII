<!-- resources/views/torty/edit.blade.php -->

@extends('layouts.appNb')

@section('content')
    <div class="container">
        <h1>Editace dortu</h1>

        <form action="{{ route('torty.update', $torta->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="nazov" class="form-label">Název</label>
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
                <label for="zakladne_zlozenie" class="form-label">Základné složení</label>
                <input type="text" class="form-control" id="zakladne_zlozenie" name="zakladne_zlozenie" value="{{ $torta->zakladne_zlozenie }}" required>
            </div>

            <div class="mb-3">
                <label for="cena" class="form-label">Cena</label>
                <input type="number" step="0.01" class="form-control" id="cena" name="cena" value="{{ $torta->cena }}" required>
            </div>

            <div class="mb-3">
                <label for="obrazok" class="form-label">Obrázek dortu</label>
                <input type="file" class="form-control" id="obrazok" name="obrazok" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Uložit změny</button>
        </form>
    </div>
@endsection
