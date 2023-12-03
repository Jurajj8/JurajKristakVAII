@extends('layouts.appNb')

@section('content')
    <div class="container">
        <h1 class="mb-4">Nákupný košík</h1>

        @if ($cartItems->isEmpty())
            <p class="text-center">Váš košík je prázdny</p>
        @else
            <ul class="list-group">
                @foreach ($cartItems as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset(Storage::url($item->torta->obrazok)) }}" alt="{{ $item->torta->nazov }}" class="img-thumbnail mr-3" style="width: 80px;">
                            <span>
                                <strong>{{ $item->torta->nazov }}</strong><br>
                                <small>{{ $item->torta->zakladne_zlozenie }}</small>
                            </span>
                        </div>
                        <div class="input-group ml-auto" style="max-width: 100px;">
                            <form action="{{ route('shopping-cart.remove', $item->torta->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Odebrat</button>
                            </form>
                            <form action="{{ route('shopping-cart.update', $item->torta->id) }}" method="POST" class="ml-2">
                                @csrf
                                @method('PUT')
                                <div class="input-group">
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary btn-sm">Aktualizovat</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif

        <div class="mt-3 text-center">
            <a href="{{ route('torty.index') }}" class="btn btn-secondary">Pokračovať v nakupovaní</a>
        </div>
    </div>
@endsection
