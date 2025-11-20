@extends('layouts.app')

@section('title', 'Pokédex')

@section('content')

<h1 class="text-center mb-5">Pokédex</h1>

<div class="row">

    @foreach ($pokemons as $pokemon)
        @php
            $parts = explode("/", rtrim($pokemon['url'], "/"));
            $id = end($parts);
            $image = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/$id.png";
        @endphp

        <div class="col-md-3 mb-4">
            <div class="card shadow text-center">
                <img src="{{ $image }}" class="card-img-top p-3" alt="{{ $pokemon['name'] }}">
                <div class="card-body">
                    <h5 class="card-title text-capitalize">{{ $pokemon['name'] }}</h5>
                    <a class="btn btn-primary" href="/pokemons/{{ $pokemon['name'] }}">
                        Ver detalles
                    </a>
                </div>
            </div>
        </div>
    @endforeach

</div>

@endsection
