@extends('layouts.app')

@section('title', ucfirst($pokemon['name']))

@section('content')

<a href="/pokemons" class="btn btn-secondary mb-3">← Regresar</a>

<div class="card shadow p-4">

    <div class="text-center">
        <h1 class="text-capitalize">{{ $pokemon['name'] }}</h1>
        <img src="{{ $pokemon['sprites']['other']['official-artwork']['front_default'] }}" 
             width="250" class="my-3">
    </div>

    <h3>Stats</h3>

    <ul class="list-group">
        @foreach ($pokemon['stats'] as $stat)
            <li class="list-group-item d-flex justify-content-between">
                <span class="text-capitalize">{{ $stat['stat']['name'] }}</span>
                <strong>{{ $stat['base_stat'] }}</strong>
            </li>
        @endforeach
    </ul>

    <div class="text-center mt-4">
        <a href="/pokemons/{{ $pokemon['name'] }}/evolution" class="btn btn-success btn-lg">
            Ver árbol evolutivo
        </a>
    </div>

</div>

@endsection
