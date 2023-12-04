@extends('layouts.appNb')
<link rel="stylesheet" href="{{ asset('css/styl.css') }}">

@section('content')
   <div class="col-md-9">
       <div class="torty-list">
           <div class="container mt-4">
               <div class="row">
                   <div class="col-md-12">
                       <h2>Koláče</h2>
                       <div class="row">
                           @foreach ($torty->where('typ_id', 1) as $torta)
                               <div class="col-md-4 mb-4">
                                   <div class="card">
                                       <img src="{{ asset(Storage::url($torta->obrazok)) }}" alt="{{ $torta->nazov }}" class="card-img-top" width="100">
                                       <div class="card-body">
                                            <h5 class="card-title">{{ $torta->nazov }}</h5>
                                            <p class="card-text">{{ $torta->zakladne_zlozenie }}</p>
                                            <p class="card-text">Cena: {{ $torta->cena }} €</p>
                                            <p class="card-text"><i>{{ $torta->popis }}</i></p>
                                            <form action="{{ route('shopping-cart.add', $torta->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Pridať do košíka</button>
                                            </form>
                                       </div>
                                   </div>
                               </div>
                           @endforeach
                       </div>
                   </div>
                   
                   <div class="col-md-12 mt-4">
                       <h2>Torty</h2>
                       <div class="row">
                           @foreach ($torty->where('typ_id', 2) as $torta)
                               <div class="col-md-4 mb-4">
                                   <div class="card">
                                       <img src="{{ asset(Storage::url($torta->obrazok)) }}" alt="{{ $torta->nazov }}" class="card-img-top" width="100">
                                       <div class="card-body">
                                           <h5 class="card-title">{{ $torta->nazov }}</h5>
                                           <p class="card-text">{{ $torta->zakladne_zlozenie }}</p>
                                           <p class="card-text">Cena: {{ $torta->cena }} €</p>
                                           <p class="card-text"><i>{{ $torta->popis }}</i></p>
                                           <form action="{{ route('shopping-cart.add', $torta->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Pridať do košíka</button>
                                            </form>
                                       </div>
                                   </div>
                               </div>
                           @endforeach
                       </div>
                   </div>
                   <div class="col-md-12 mt-4">
                       <h2>Naposledy přidané</h2>
                       <div class="row">
                           @foreach ($torty->sortByDesc('created_at')->take(6) as $torta)
                               <div class="col-md-4 mb-4">
                                   <div class="card">
                                       <img src="{{ asset(Storage::url($torta->obrazok)) }}" alt="{{ $torta->nazov }}" class="card-img-top" width="100">
                                       <div class="card-body">
                                           <h5 class="card-title">{{ $torta->nazov }}</h5>
                                           <p class="card-text">{{ $torta->zakladne_zlozenie }}</p>
                                           <p class="card-text">Cena: {{ $torta->cena }} €</p>
                                           <p class="card-text"><i>{{ $torta->popis }}</i></p>
                                           <form action="{{ route('shopping-cart.add', $torta->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Pridať do košíka</button>
                                            </form>
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
@endsection
