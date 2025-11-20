@extends('layouts.app')

@section('title', 'Evolución de ' . ucfirst($name))

@section('content')

<a href="/pokemons/{{ $name }}" class="btn btn-secondary mb-4">← Regresar</a>

<h1 class="text-center mb-5">Árbol Evolutivo</h1>

@php
    function getImg($pokeName) {
        $data = json_decode(
            file_get_contents("https://pokeapi.co/api/v2/pokemon/$pokeName"),
            true
        );
        return $data['sprites']['other']['official-artwork']['front_default'];
    }

    $chain = $evolutionChain['chain'];
@endphp

<div class="text-center">

    <div class="mb-4">
        <h3 class="text-capitalize">{{ $chain['species']['name'] }}</h3>
        <img src="{{ getImg($chain['species']['name']) }}" width="200">
    </div>

    @if (!empty($chain['evolves_to']))
        <h2 class="my-3">⬇</h2>

        @foreach ($chain['evolves_to'] as $evo1)
            <div class="mb-4">
                <h3 class="text-capitalize">{{ $evo1['species']['name'] }}</h3>
                <img src="{{ getImg($evo1['species']['name']) }}" width="200">
            </div>

            @if (!empty($evo1['evolves_to']))
                <h2 class="my-3">⬇</h2>

                @foreach ($evo1['evolves_to'] as $evo2)
                    <div class="mb-4">
                        <h3 class="text-capitalize">{{ $evo2['species']['name'] }}</h3>
                        <img src="{{ getImg($evo2['species']['name']) }}" width="200">
                    </div>
                @endforeach
            @endif
        @endforeach
    @endif

</div>

@endsection
