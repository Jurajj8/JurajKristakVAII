<!-- resources/views/profile/show.blade.php -->

@extends('layouts.appNb')
<link rel="stylesheet" href="{{ asset('css/styl.css') }}">

@section('content')
<!-- AXIOS skript -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
                <div class="torty-list">
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Vytvorené torty</h1>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($torty as $torta)
                                <div class="col-md-4 mb-4">
                                    <div class="card text-center">
                                        <img src="{{ asset(Storage::url($torta->obrazok)) }}" alt="{{ $torta->nazov }}" class="card-img-top" width="100">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $torta->nazov }}</h5>
                                            <p class="card-text">{{ $torta->zakladne_zlozenie }}</p>
                                            <p class="card-text">Cena: {{ $torta->cena }} €</p>
                                            <p class="card-text"><i>{{ $torta->popis }}</i></p>
                                            <div class="col-md-12 text-center">
                                                <a href="{{ route('torty.edit', $torta->id) }}" class="btn btn-primary mb-2">Upraviť</a>
                                                <button class="btn btn-danger mb-2" onclick="deleteTorta('{{ $torta->id }}')">Zmazať</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function deleteTorta(tortaId) {
        if (confirm("Naozaj chcete zmazať tortu?")) {
            axios.delete(`/torta-ajax/${tortaId}`)
                .then(response => {
                    console.log(response.data.message);
                    location.reload();
                })
                .catch(error => {
                    console.error('Chyba při odstraňování torty:', error);
                });
        }
    }
</script>
@endsection
